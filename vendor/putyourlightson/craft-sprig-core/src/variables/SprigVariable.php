<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\sprig\variables;

use Craft;
use craft\db\Paginator;
use craft\helpers\Html;
use craft\helpers\Template;
use putyourlightson\sprig\base\Component;
use putyourlightson\sprig\Sprig;
use Twig\Markup;
use yii\db\Query;

class SprigVariable
{
    /**
     * @var string
     */
    public $htmxVersion = '1.7.0';

    /**
     * Get the SRI hash from https://htmx.org/docs/#installing
     * or generate it at https://www.srihash.org/
     *
     * @var string
     */
    public $htmxSRIHash = 'sha384-EzBXYPt0/T6gxNp0nuPtLkmRpmDBbjg6WmCUZRLXBBwYYmwAUxzlSGej0ARHX0Bo';

    /**
     * Returns the script tag with the given attributes.
     *
     * @param array $attributes
     * @return Markup
     */
    public function getScript(array $attributes = []): Markup
    {
        return $this->_getScript($attributes);
    }

    /**
     * Returns whether this is a Sprig request.
     *
     * @return bool
     */
    public function getIsRequest(): bool
    {
        return Component::getIsRequest();
    }

    /**
     * Returns whether this is a Sprig include.
     *
     * @return bool
     */
    public function getIsInclude(): bool
    {
        return Component::getIsInclude();
    }

    /**
     * Returns whether this is a boosted request.
     *
     * @return bool
     */
    public static function getIsBoosted(): bool
    {
        return Component::getIsBoosted();
    }

    /**
     * Returns the ID of the active element.
     *
     * @return string
     * @deprecated
     */
    public function getElement(): string
    {
        Craft::$app->getDeprecator()->log(__METHOD__, 'The “sprig.element” tag has been deprecated and should be removed from templates.');

        return '';
    }

    /**
     * Returns the name of the active element.
     *
     * @return string
     * @deprecated
     */
    public function getElementName(): string
    {
        Craft::$app->getDeprecator()->log(__METHOD__, 'The “sprig.elementName” tag has been deprecated and should be removed from templates.');

        return '';
    }

    /**
     * Returns the value of the active element.
     *
     * @return string
     * @deprecated
     */
    public function getElementValue(): string
    {
        Craft::$app->getDeprecator()->log(__METHOD__, 'The “sprig.elementValue” tag has been deprecated and should be removed from templates.');

        return '';
    }

    /**
     * Returns the ID of the original target of the event that triggered the request.
     *
     * @return string
     * @deprecated
     */
    public function getEventTarget(): string
    {
        Craft::$app->getDeprecator()->log(__METHOD__, 'The “sprig.eventTarget” tag has been deprecated and should be removed from templates.');

        return '';
    }

    /**
     * Returns the value entered by the user when prompted via `s-prompt`.
     *
     * @return string
     */
    public function getPrompt(): string
    {
        return Component::getPrompt();
    }

    /**
     * Returns the ID of the target element.
     *
     * @return string
     */
    public function getTarget(): string
    {
        return Component::getTarget();
    }

    /**
     * Returns the ID of the element that triggered the request.
     *
     * @return string
     */
    public function getTrigger(): string
    {
        return Component::getTrigger();
    }

    /**
     * Returns the name of the element that triggered the request.
     *
     * @return string
     */
    public function getTriggerName(): string
    {
        return Component::getTriggerName();
    }

    /**
     * Returns the URL that the Sprig component was loaded from.
     *
     * @return string
     */
    public function getUrl(): string
    {
        return Component::getUrl();
    }

    /**
     * Paginates an element query.
     *
     * @param Query $query
     * @param int $currentPage
     * @param array $config
     * @return PaginateVariable
     */
    public function paginate(Query $query, int $currentPage = 1, array $config = []): PaginateVariable
    {
        $paginatorQuery = clone $query;
        $paginatorQuery->limit(null);

        $defaultConfig = [
            'currentPage' => $currentPage,
            'pageSize' => $query->limit ?: 100,
        ];
        $config = array_merge($defaultConfig, $config);
        $paginator = new Paginator($paginatorQuery, $config);

        return PaginateVariable::create($paginator);
    }

    /**
     * Pushes the URL into the history stack.
     *
     * @param string $url
     */
    public function pushUrl(string $url)
    {
        Component::pushUrl($url);
    }

    /**
     * Redirects the browser to the URL.
     * https://htmx.org/reference#response_headers
     *
     * @param string $url
     */
    public function redirect(string $url)
    {
        Component::redirect($url);
    }

    /**
     * Refreshes the browser.
     * https://htmx.org/reference#response_headers
     *
     * @param bool $refresh
     */
    public function refresh(bool $refresh = true)
    {
        Component::refresh($refresh);
    }

    /**
     * Retargets the element to update with a CSS selector.
     * https://htmx.org/reference#response_headers
     *
     * @param string $target
     */
    public function retarget(string $target)
    {
        Component::retarget($target);
    }

    /**
     * Triggers client-side events.
     *
     * @param string|array $events
     * @param string $on
     */
    public function triggerEvents($events, string $on = 'load')
    {
        Component::triggerEvents($events, $on);
    }

    /**
     * Returns a new component.
     *
     * @param string $value
     * @param array $variables
     * @param array $attributes
     * @return Markup
     */
    public function getComponent(string $value, array $variables = [], array $attributes = []): Markup
    {
        return Sprig::$core->components->create($value, $variables, $attributes);
    }

    /**
     * Returns a script tag to the source file.
     *
     * @param array $attributes
     * @return Markup
     */
    private function _getScript(array $attributes = []): Markup
    {
        $url = 'https://unpkg.com/htmx.org@'.$this->htmxVersion.'/dist/htmx.min.js';

        if (Craft::$app->getConfig()->env == 'dev') {
            $url = str_replace('htmx.min.js', 'htmx.js', $url);
        }
        else {
            // Add subresource integrity
            // https://github.com/bigskysoftware/htmx/issues/261
            $attributes['integrity'] = $this->htmxSRIHash;
            $attributes['crossorigin'] = 'anonymous';
        }

        $script = Html::jsFile($url, $attributes);

        return Template::raw($script);
    }
}
