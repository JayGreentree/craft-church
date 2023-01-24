<?php
/**
 * Pitch plugin for Craft CMS 3.x
 *
 * On the go SCSS compiling, CSS/JS minifying, merging and caching.
 *
 * @link      https://cloudgray.com.au/
 * @copyright Copyright (c) 2020 Cloud Gray Pty Ltd
 */

namespace cloudgrayau\pitch\controllers;

use cloudgrayau\pitch\Pitch;
use cloudgrayau\pitch\models\Paths;
use cloudgrayau\pitch\models\Cached;
use cloudgrayau\pitch\models\Minify;

use Craft;
use craft\web\Controller;
use craft\helpers\FileHelper;
use yii\web\NotFoundHttpException;

/**
 * @author    Cloud Gray Pty Ltd
 * @package   Pitch
 * @since     1.2.0
 */
class JsController extends Controller {

  // Protected Properties
  // =========================================================================

  /**
   * @var    bool|array Allows anonymous access to this controller's actions.
   *         The actions must be in 'kebab-case'
   * @access protected
   */
  protected $allowAnonymous = ['index' => self::ALLOW_ANONYMOUS_LIVE | self::ALLOW_ANONYMOUS_OFFLINE];

  // Public Methods
  // =========================================================================

  /**
   * @return mixed
   */
  public function actionIndex(){
    Paths::doInit();
    $output = Paths::$output;
    array_pop($output);
    $string = implode('/', $output);
    if (($val = stripos($string, ',')) && ($val !== false)){
      $url = implode('/', Paths::$output);
      $dir = explode('/', substr($url, 0, $val));
      $original = array_pop($dir);
      $dir = implode('/', $dir).'/';
      $files = $original.','.substr($url, $val+1);
    } else {
      $files = array_pop(Paths::$output);
      $dir = implode('/', Paths::$output).'/';
    }
    if ($result = self::initJS($dir, $files)){
      exit();
    }
    throw new NotFoundHttpException('Page not found.');
  }

  private static function initJS($dir, $files){
    $webroot = Craft::getAlias('@webroot').'/';
    $settings = Pitch::getInstance()->settings;
    $ext = strrchr($files,'.');
    $files = explode(',', substr($files, 0, -strlen($ext)));
    ob_start();
    $filemtime = 0;
    $count = 0;
    foreach($files as $file){
      $pos = strpos($file,':');
      if (($pos !== false) && (ctype_digit(substr($file, $pos+1)))){
        $file = substr($file, 0, $pos);
      }
      $file = $dir.$file.'.js';
      if (file_exists($webroot.$file)){
        ++$count;
        $mtime = filemtime($webroot.$file);
        if ($mtime > $filemtime){
          $filemtime = $mtime;
        }
        readfile($webroot.$file);
        echo "\n";
      }
    }
    $js = ob_get_contents();
    ob_end_clean();
    if ($count == 0){
      return false;
    }
    $offset = ($settings->cacheDuration > 0) ? $settings->cacheDuration : 2592000;
    ob_start('ob_gzhandler');
    header('Content-Type: text/javascript; charset=utf-8');
    if (Craft::$app->getConfig()->general->devMode){
      header('Cache-control: no-cache');
      $offset = 0;
    } else {
      header('Cache-control: max-age='.$offset.', public, must-revalidate');
    }
    header('Last-Modified: '.gmdate('D, d M Y H:i:s', $filemtime).' GMT');
    header('Expires: ' .gmdate('D, d M Y H:i:s',$filemtime + $offset) . ' GMT');
    header('Link: <'.$_SERVER['REQUEST_URI'].'>; rel=preload; as=script;');
    header('Connection: keep-alive');
    $cacheDir = (!empty($settings->cacheDir)) ? $settings->cacheDir : '@storage/pitch';
    $cacheFolderPath = FileHelper::normalizePath(
      Craft::parseEnv($cacheDir)
    ).'/';
    if (!is_dir($cacheFolderPath)){
      FileHelper::createDirectory($cacheFolderPath);
    }
    $c = new Cached($cacheFolderPath, $settings->useCache, $settings->advancedCache);
    if (!$c->cache(Craft::$app->getRequest()-> fullPath, $offset, $filemtime)){
      if ($settings->minifyFiles){
        echo Minify::minifyJS(str_replace('$baseUrl', Craft::$app->getRequest()->baseUrl, $js));
      } else {
        echo str_replace('$baseUrl', Craft::$app->getRequest()->baseUrl, $js);
      }
      $c->write();
    }
    header('Etag: '.sprintf('"%s-%s"',$filemtime,md5(ob_get_contents())));
    return $c->dump();
  }

}