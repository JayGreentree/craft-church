<?php
/********************************************************************************
 machform
  
 Copyright 2007-2016 Appnitro Software. This code cannot be redistributed without
 permission from http://www.appnitro.com/
 
 More info at: http://www.appnitro.com/
 ********************************************************************************/
	
	function create_ap_forms_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."forms` (
										  `form_id` int(11) NOT NULL AUTO_INCREMENT,
										  `form_name` text,
										  `form_description` text,
										  `form_name_hide` tinyint(1) NOT NULL DEFAULT '0',
										  `form_tags` varchar(255) DEFAULT NULL,
										  `form_email` text,
										  `form_redirect` text,
										  `form_redirect_enable` int(1) NOT NULL DEFAULT '0',
										  `form_success_message` text,
										  `form_disabled_message` text,
										  `form_password` varchar(100) DEFAULT NULL,
										  `form_unique_ip` int(1) NOT NULL DEFAULT '0',
										  `form_unique_ip_maxcount` int(11) NOT NULL DEFAULT '5',
										  `form_unique_ip_period` char(1) NOT NULL DEFAULT 'd' COMMENT 'h,d,w,m,y,l (hour/day/week/month/year/lifetime)',
										  `form_frame_height` int(11) DEFAULT NULL,
										  `form_has_css` int(11) NOT NULL DEFAULT '0',
										  `form_captcha` int(11) NOT NULL DEFAULT '0',
										  `form_captcha_type` char(1) NOT NULL DEFAULT 'n',
										  `form_active` int(11) NOT NULL DEFAULT '1',
										  `form_theme_id` int(11) NOT NULL DEFAULT '0',
										  `form_review` int(11) NOT NULL DEFAULT '0',
										  `form_resume_enable` int(1) NOT NULL DEFAULT '0',
										  `form_resume_subject` text,
										  `form_resume_content` mediumtext,
										  `form_resume_from_name` text,
										  `form_resume_from_email_address` varchar(255) DEFAULT '',
										  `form_custom_script_enable` int(1) NOT NULL DEFAULT '0',
										  `form_custom_script_url` text,
										  `form_limit_enable` int(1) NOT NULL DEFAULT '0',
										  `form_limit` int(11) NOT NULL DEFAULT '0',
										  `form_label_alignment` varchar(11) NOT NULL DEFAULT 'top_label',
										  `form_language` varchar(50) DEFAULT NULL,
										  `form_page_total` int(11) NOT NULL DEFAULT '1',
										  `form_lastpage_title` varchar(255) DEFAULT NULL,
										  `form_submit_primary_text` varchar(255) NOT NULL DEFAULT 'Submit',
										  `form_submit_secondary_text` varchar(255) NOT NULL DEFAULT 'Previous',
										  `form_submit_primary_img` varchar(255) DEFAULT NULL,
										  `form_submit_secondary_img` varchar(255) DEFAULT NULL,
										  `form_submit_use_image` int(1) NOT NULL DEFAULT '0',
										  `form_review_primary_text` varchar(255) NOT NULL DEFAULT 'Submit',
										  `form_review_secondary_text` varchar(255) NOT NULL DEFAULT 'Previous',
										  `form_review_primary_img` varchar(255) DEFAULT NULL,
										  `form_review_secondary_img` varchar(255) DEFAULT NULL,
										  `form_review_use_image` int(11) NOT NULL DEFAULT '0',
										  `form_review_title` text,
										  `form_review_description` text,
										  `form_pagination_type` varchar(11) NOT NULL DEFAULT 'steps',
										  `form_schedule_enable` int(1) NOT NULL DEFAULT '0',
										  `form_schedule_start_date` date DEFAULT NULL,
										  `form_schedule_end_date` date DEFAULT NULL,
										  `form_schedule_start_hour` time DEFAULT NULL,
										  `form_schedule_end_hour` time DEFAULT NULL,
										  `form_approval_enable` tinyint(1) NOT NULL DEFAULT '0',
										  `form_created_date` date DEFAULT NULL,
										  `form_created_by` int(11) DEFAULT NULL,
										  `esl_enable` tinyint(1) NOT NULL DEFAULT '0',
										  `esl_from_name` text,
										  `esl_from_email_address` varchar(255) DEFAULT NULL,
										  `esl_bcc_email_address` text,
										  `esl_replyto_email_address` varchar(255) DEFAULT NULL,
										  `esl_subject` text,
										  `esl_content` mediumtext,
										  `esl_plain_text` int(11) NOT NULL DEFAULT '0',
										  `esl_pdf_enable` tinyint(1) NOT NULL DEFAULT '0',
										  `esl_pdf_content` mediumtext,
										  `esr_enable` tinyint(1) NOT NULL DEFAULT '0',
										  `esr_email_address` text,
										  `esr_from_name` text,
										  `esr_from_email_address` varchar(255) DEFAULT NULL,
										  `esr_bcc_email_address` text,
										  `esr_replyto_email_address` varchar(255) DEFAULT NULL,
										  `esr_subject` text,
										  `esr_content` mediumtext,
										  `esr_plain_text` int(11) NOT NULL DEFAULT '0',
										  `esr_pdf_enable` int(1) NOT NULL DEFAULT '0',
										  `esr_pdf_content` mediumtext,
										  `payment_enable_merchant` int(1) NOT NULL DEFAULT '0',
										  `payment_merchant_type` varchar(25) NOT NULL DEFAULT 'paypal_standard',
										  `payment_paypal_email` varchar(255) DEFAULT NULL,
										  `payment_paypal_language` varchar(5) NOT NULL DEFAULT 'US',
										  `payment_currency` varchar(5) NOT NULL DEFAULT 'USD',
										  `payment_show_total` int(1) NOT NULL DEFAULT '0',
										  `payment_total_location` varchar(11) NOT NULL DEFAULT 'top',
										  `payment_enable_recurring` int(1) NOT NULL DEFAULT '0',
										  `payment_recurring_cycle` int(11) NOT NULL DEFAULT '1',
										  `payment_recurring_unit` varchar(5) NOT NULL DEFAULT 'month',
										  `payment_enable_trial` int(1) NOT NULL DEFAULT '0',
										  `payment_trial_period` int(11) NOT NULL DEFAULT '1',
										  `payment_trial_unit` varchar(5) NOT NULL DEFAULT 'month',
										  `payment_trial_amount` decimal(62,2) NOT NULL DEFAULT '0.00',
										  `payment_enable_setupfee` int(1) NOT NULL DEFAULT '0',
										  `payment_setupfee_amount` decimal(62,2) NOT NULL DEFAULT '0.00',
										  `payment_price_type` varchar(11) NOT NULL DEFAULT 'fixed',
										  `payment_price_amount` decimal(62,2) NOT NULL DEFAULT '0.00',
										  `payment_price_name` varchar(255) DEFAULT NULL,
										  `payment_stripe_live_secret_key` varchar(255) DEFAULT NULL,
										  `payment_stripe_live_public_key` varchar(255) DEFAULT NULL,
										  `payment_stripe_test_secret_key` varchar(255) DEFAULT NULL,
										  `payment_stripe_test_public_key` varchar(255) DEFAULT NULL,
										  `payment_stripe_enable_test_mode` int(1) NOT NULL DEFAULT '0',
										  `payment_stripe_enable_receipt` int(1) NOT NULL DEFAULT '0',
										  `payment_stripe_receipt_element_id` int(11) DEFAULT NULL,
										  `payment_stripe_enable_payment_request_button` int(1) NOT NULL DEFAULT '0',
										  `payment_stripe_account_country` varchar(2) DEFAULT NULL,
										  `payment_paypal_rest_live_clientid` varchar(100) DEFAULT NULL,
										  `payment_paypal_rest_live_secret_key` varchar(100) DEFAULT NULL,
										  `payment_paypal_rest_test_clientid` varchar(100) DEFAULT NULL,
										  `payment_paypal_rest_test_secret_key` varchar(100) DEFAULT NULL,
										  `payment_paypal_rest_enable_test_mode` int(1) NOT NULL DEFAULT '0',
										  `payment_authorizenet_live_apiloginid` varchar(50) DEFAULT NULL,
										  `payment_authorizenet_live_transkey` varchar(50) DEFAULT NULL,
										  `payment_authorizenet_test_apiloginid` varchar(50) DEFAULT NULL,
										  `payment_authorizenet_test_transkey` varchar(50) DEFAULT NULL,
										  `payment_authorizenet_enable_test_mode` int(1) NOT NULL DEFAULT '0',
										  `payment_authorizenet_save_cc_data` int(1) NOT NULL DEFAULT '0',
										  `payment_authorizenet_enable_email` int(1) NOT NULL DEFAULT '0',
										  `payment_authorizenet_email_element_id` int(11) DEFAULT NULL,
										  `payment_braintree_live_merchant_id` varchar(50) DEFAULT NULL,
										  `payment_braintree_live_public_key` varchar(50) DEFAULT NULL,
										  `payment_braintree_live_private_key` varchar(50) DEFAULT NULL,
										  `payment_braintree_live_encryption_key` text,
										  `payment_braintree_test_merchant_id` varchar(50) DEFAULT NULL,
										  `payment_braintree_test_public_key` varchar(50) DEFAULT NULL,
										  `payment_braintree_test_private_key` varchar(50) DEFAULT NULL,
										  `payment_braintree_test_encryption_key` text,
										  `payment_braintree_enable_test_mode` int(1) NOT NULL DEFAULT '0',
										  `payment_paypal_enable_test_mode` int(1) NOT NULL DEFAULT '0',
										  `payment_enable_invoice` int(1) NOT NULL DEFAULT '0',
										  `payment_invoice_email` varchar(255) DEFAULT NULL,
										  `payment_delay_notifications` int(1) NOT NULL DEFAULT '1',
										  `payment_ask_billing` int(1) NOT NULL DEFAULT '0',
										  `payment_ask_shipping` int(1) NOT NULL DEFAULT '0',
										  `payment_enable_tax` int(1) NOT NULL DEFAULT '0',
										  `payment_tax_rate` decimal(62,2) NOT NULL DEFAULT '0.00',
										  `payment_enable_discount` int(1) NOT NULL DEFAULT '0',
										  `payment_discount_type` varchar(12) NOT NULL DEFAULT 'percent_off',
										  `payment_discount_amount` decimal(62,2) NOT NULL DEFAULT '0.00',
										  `payment_discount_code` text,
										  `payment_discount_element_id` int(11) DEFAULT NULL,
										  `payment_discount_max_usage` int(11) NOT NULL DEFAULT '0',
										  `payment_discount_expiry_date` date DEFAULT NULL,
										  `logic_field_enable` tinyint(1) NOT NULL DEFAULT '0',
										  `logic_page_enable` tinyint(1) NOT NULL DEFAULT '0',
										  `logic_email_enable` tinyint(1) NOT NULL DEFAULT '0',
										  `logic_webhook_enable` int(1) NOT NULL DEFAULT '0',
										  `logic_success_enable` int(1) NOT NULL DEFAULT '0',
										  `webhook_enable` tinyint(1) NOT NULL DEFAULT '0',
										  `webhook_url` text,
										  `webhook_method` varchar(4) NOT NULL DEFAULT 'post',
										  `form_encryption_enable` tinyint(1) NOT NULL DEFAULT '0',
										  `form_encryption_public_key` text,
										  `form_entry_edit_enable` tinyint(1) NOT NULL DEFAULT '0',
										  `form_entry_edit_resend_notifications` tinyint(1) NOT NULL DEFAULT '0',
										  `form_entry_edit_rerun_logics` tinyint(1) NOT NULL DEFAULT '0',
										  `form_entry_edit_auto_disable` tinyint(1) NOT NULL DEFAULT '0',
										  `form_entry_edit_auto_disable_period` int(11) NOT NULL DEFAULT '1',
										  `form_entry_edit_auto_disable_unit` char(1) NOT NULL DEFAULT 'r' COMMENT 'r,h,d',
										  `form_entry_edit_hide_editlink` tinyint(1) NOT NULL DEFAULT '0',
										  PRIMARY KEY (`form_id`),
										  KEY `form_tags` (`form_tags`)
										) DEFAULT CHARSET=utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}
	
	function create_ap_column_preferences_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."column_preferences` (
																		  `acp_id` int(11) NOT NULL AUTO_INCREMENT,
																		  `form_id` int(11) DEFAULT NULL,
																		  `user_id` int(11) NOT NULL DEFAULT '1',
																		  `incomplete_entries` int(1) NOT NULL DEFAULT '0',
																		  `element_name` varchar(255) NOT NULL DEFAULT '',
																		  `position` int(11) NOT NULL DEFAULT '0',
																		  PRIMARY KEY (`acp_id`),
																		  KEY `acp_position` (`form_id`,`position`)
																		) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_element_options_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."element_options` (
														  `aeo_id` int(11) NOT NULL AUTO_INCREMENT,
														  `form_id` int(11) NOT NULL DEFAULT '0',
														  `element_id` int(11) NOT NULL DEFAULT '0',
														  `option_id` int(11) NOT NULL DEFAULT '0',
														  `position` int(11) NOT NULL DEFAULT '0',
														  `option` text,
														  `option_is_default` int(11) NOT NULL DEFAULT '0',
														  `option_is_hidden` int(11) NOT NULL DEFAULT '0',
														  `live` int(11) NOT NULL DEFAULT '1',
														  PRIMARY KEY (`aeo_id`),
														  KEY `form_id` (`form_id`),
														  KEY `element_id` (`element_id`)
														) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_element_prices_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."element_prices` (
														  `aep_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
														  `form_id` int(11) NOT NULL,
														  `element_id` int(11) NOT NULL,
														  `option_id` int(11) NOT NULL DEFAULT '0',
														  `price` decimal(62,2) NOT NULL DEFAULT '0.00',
														  PRIMARY KEY (`aep_id`),
														  KEY `form_id` (`form_id`),
														  KEY `element_id` (`element_id`)
														) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_form_elements_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_elements` (
													  `form_id` int(11) NOT NULL DEFAULT '0',
													  `element_id` int(11) NOT NULL DEFAULT '0',
													  `element_title` text,
													  `element_guidelines` text,
													  `element_size` varchar(6) NOT NULL DEFAULT 'medium',
													  `element_is_required` int(1) NOT NULL DEFAULT '0',
													  `element_is_unique` int(1) NOT NULL DEFAULT '0',
													  `element_is_readonly` int(1) NOT NULL DEFAULT '0',
													  `element_is_private` int(1) NOT NULL DEFAULT '0' COMMENT '0=public,1=admin-only,2=hidden',
													  `element_is_encrypted` int(1) NOT NULL DEFAULT '0',
													  `element_type` varchar(50) DEFAULT NULL,
													  `element_position` int(11) NOT NULL DEFAULT '0',
													  `element_default_value` text,
													  `element_enable_placeholder` int(1) NOT NULL DEFAULT '0',
													  `element_constraint` varchar(255) DEFAULT NULL,
													  `element_total_child` int(11) NOT NULL DEFAULT '0',
													  `element_css_class` varchar(255) NOT NULL DEFAULT '',
													  `element_range_min` bigint(11) unsigned NOT NULL DEFAULT '0',
													  `element_range_max` bigint(11) unsigned NOT NULL DEFAULT '0',
													  `element_range_limit_by` char(1) NOT NULL,
													  `element_status` int(1) NOT NULL DEFAULT '2',
													  `element_choice_columns` int(1) NOT NULL DEFAULT '1',
													  `element_choice_has_other` int(1) NOT NULL DEFAULT '0',
													  `element_choice_other_label` text,
													  `element_choice_limit_rule` varchar(12) NOT NULL DEFAULT 'atleast',
													  `element_choice_limit_qty` int(11) NOT NULL DEFAULT '1',
													  `element_choice_limit_range_min` int(11) NOT NULL DEFAULT '1',
													  `element_choice_limit_range_max` int(11) NOT NULL DEFAULT '1',
													  `element_choice_max_entry` int(11) NOT NULL DEFAULT '0',
													  `element_time_showsecond` int(11) NOT NULL DEFAULT '0',
													  `element_time_24hour` int(11) NOT NULL DEFAULT '0',
													  `element_address_hideline2` int(11) NOT NULL DEFAULT '0',
													  `element_address_us_only` int(11) NOT NULL DEFAULT '0',
													  `element_date_enable_range` int(1) NOT NULL DEFAULT '0',
													  `element_date_range_min` date DEFAULT NULL,
													  `element_date_range_max` date DEFAULT NULL,
													  `element_date_enable_selection_limit` int(1) NOT NULL DEFAULT '0',
													  `element_date_selection_max` int(11) NOT NULL DEFAULT '1',
													  `element_date_past_future` char(1) NOT NULL DEFAULT 'p',
													  `element_date_disable_past_future` int(1) NOT NULL DEFAULT '0',
													  `element_date_disable_dayofweek` int(1) NOT NULL DEFAULT '0',
													  `element_date_disabled_dayofweek_list` varchar(15) DEFAULT NULL,
													  `element_date_disable_specific` int(1) NOT NULL DEFAULT '0',
													  `element_date_disabled_list` text CHARACTER SET utf8 COLLATE utf8_bin,
													  `element_file_enable_type_limit` int(1) NOT NULL DEFAULT '1',
													  `element_file_block_or_allow` char(1) NOT NULL DEFAULT 'b',
													  `element_file_type_list` text,
													  `element_file_as_attachment` int(1) NOT NULL DEFAULT '0',
													  `element_file_auto_upload` int(1) NOT NULL DEFAULT '0',
													  `element_file_enable_multi_upload` int(1) NOT NULL DEFAULT '0',
													  `element_file_max_selection` int(11) NOT NULL DEFAULT '5',
													  `element_file_enable_size_limit` int(1) NOT NULL DEFAULT '0',
													  `element_file_size_max` int(11) DEFAULT NULL,
													  `element_matrix_allow_multiselect` int(1) NOT NULL DEFAULT '0',
													  `element_matrix_parent_id` int(11) NOT NULL DEFAULT '0',
													  `element_number_enable_quantity` int(1) NOT NULL DEFAULT '0',
													  `element_number_quantity_link` varchar(15) DEFAULT NULL,
													  `element_section_display_in_email` int(1) NOT NULL DEFAULT '1',
													  `element_section_enable_scroll` int(1) NOT NULL DEFAULT '0',
													  `element_submit_use_image` int(1) NOT NULL DEFAULT '0',
													  `element_submit_primary_text` varchar(255) NOT NULL DEFAULT 'Continue',
													  `element_submit_secondary_text` varchar(255) NOT NULL DEFAULT 'Previous',
													  `element_submit_primary_img` varchar(255) DEFAULT NULL,
													  `element_submit_secondary_img` varchar(255) DEFAULT NULL,
													  `element_page_title` varchar(255) DEFAULT NULL,
													  `element_page_number` int(11) NOT NULL DEFAULT '1',
													  `element_text_default_type` varchar(6) NOT NULL DEFAULT 'static',
													  `element_text_default_length` int(11) NOT NULL DEFAULT '10',
													  `element_text_default_random_type` varchar(8) NOT NULL DEFAULT 'letter',
													  `element_text_default_prefix` varchar(50) DEFAULT NULL,
													  `element_text_default_case` char(1) NOT NULL DEFAULT 'u',
													  `element_email_enable_confirmation` int(1) NOT NULL DEFAULT '0',
													  `element_email_confirm_field_label` varchar(255) DEFAULT NULL,
													  `element_media_type` varchar(8) NOT NULL DEFAULT 'image',
													  `element_media_image_src` text,
													  `element_media_image_width` int(11) DEFAULT NULL,
													  `element_media_image_height` int(11) DEFAULT NULL,
													  `element_media_image_alignment` char(1) NOT NULL DEFAULT 'l',
													  `element_media_image_alt` text,
													  `element_media_image_href` text,
													  `element_media_display_in_email` int(1) NOT NULL DEFAULT '0',
													  `element_media_video_src` text,
													  `element_media_video_size` varchar(6) NOT NULL DEFAULT 'large',
													  `element_media_video_muted` int(1) NOT NULL DEFAULT '0',
													  `element_media_video_caption_file` text,
													  `element_media_pdf_src` text,
													  PRIMARY KEY (`form_id`,`element_id`)
													) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_form_filters_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_filters` (
													  `aff_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
													  `form_id` int(11) NOT NULL,
													  `user_id` int(11) NOT NULL DEFAULT '1',
													  `incomplete_entries` int(1) NOT NULL DEFAULT '0',
													  `element_name` varchar(50) NOT NULL DEFAULT '',
													  `filter_condition` varchar(15) NOT NULL DEFAULT 'is',
													  `filter_keyword` varchar(255) NOT NULL DEFAULT '',
													  PRIMARY KEY (`aff_id`),
													  KEY `form_id` (`form_id`)
													) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_form_themes_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_themes` (
												  `theme_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
												  `user_id` int(11) NOT NULL DEFAULT '1',
												  `status` int(1) DEFAULT '1',
												  `theme_has_css` int(1) NOT NULL DEFAULT '0',
												  `theme_name` varchar(255) DEFAULT '',
												  `theme_built_in` int(1) NOT NULL DEFAULT '0',
												  `theme_is_private` int(11) NOT NULL DEFAULT '1',
												  `logo_type` varchar(11) NOT NULL DEFAULT 'default' COMMENT 'default,custom,disabled',
												  `logo_custom_image` text,
												  `logo_custom_height` int(11) NOT NULL DEFAULT '40',
												  `logo_default_image` varchar(50) DEFAULT '',
												  `logo_default_repeat` int(1) NOT NULL DEFAULT '0',
												  `wallpaper_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
												  `wallpaper_bg_color` varchar(11) DEFAULT '',
												  `wallpaper_bg_pattern` varchar(50) DEFAULT '',
												  `wallpaper_bg_custom` text,
												  `header_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
												  `header_bg_color` varchar(11) DEFAULT '',
												  `header_bg_pattern` varchar(50) DEFAULT '',
												  `header_bg_custom` text,
												  `form_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
												  `form_bg_color` varchar(11) DEFAULT '',
												  `form_bg_pattern` varchar(50) DEFAULT '',
												  `form_bg_custom` text,
												  `highlight_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
												  `highlight_bg_color` varchar(11) DEFAULT '',
												  `highlight_bg_pattern` varchar(50) DEFAULT '',
												  `highlight_bg_custom` text,
												  `guidelines_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
												  `guidelines_bg_color` varchar(11) DEFAULT '',
												  `guidelines_bg_pattern` varchar(50) DEFAULT '',
												  `guidelines_bg_custom` text,
												  `field_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
												  `field_bg_color` varchar(11) DEFAULT '',
												  `field_bg_pattern` varchar(50) DEFAULT '',
												  `field_bg_custom` text,
												  `form_title_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
												  `form_title_font_weight` int(11) NOT NULL DEFAULT '400',
												  `form_title_font_style` varchar(25) NOT NULL DEFAULT 'normal',
												  `form_title_font_size` varchar(11) DEFAULT '',
												  `form_title_font_color` varchar(11) DEFAULT '',
												  `form_desc_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
												  `form_desc_font_weight` int(11) NOT NULL DEFAULT '400',
												  `form_desc_font_style` varchar(25) NOT NULL DEFAULT 'normal',
												  `form_desc_font_size` varchar(11) DEFAULT '',
												  `form_desc_font_color` varchar(11) DEFAULT '',
												  `field_title_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
												  `field_title_font_weight` int(11) NOT NULL DEFAULT '400',
												  `field_title_font_style` varchar(25) NOT NULL DEFAULT 'normal',
												  `field_title_font_size` varchar(11) DEFAULT '',
												  `field_title_font_color` varchar(11) DEFAULT '',
												  `guidelines_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
												  `guidelines_font_weight` int(11) NOT NULL DEFAULT '400',
												  `guidelines_font_style` varchar(25) NOT NULL DEFAULT 'normal',
												  `guidelines_font_size` varchar(11) DEFAULT '',
												  `guidelines_font_color` varchar(11) DEFAULT '',
												  `section_title_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
												  `section_title_font_weight` int(11) NOT NULL DEFAULT '400',
												  `section_title_font_style` varchar(25) NOT NULL DEFAULT 'normal',
												  `section_title_font_size` varchar(11) DEFAULT '',
												  `section_title_font_color` varchar(11) DEFAULT '',
												  `section_desc_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
												  `section_desc_font_weight` int(11) NOT NULL DEFAULT '400',
												  `section_desc_font_style` varchar(25) NOT NULL DEFAULT 'normal',
												  `section_desc_font_size` varchar(11) DEFAULT '',
												  `section_desc_font_color` varchar(11) DEFAULT '',
												  `field_text_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
												  `field_text_font_weight` int(11) NOT NULL DEFAULT '400',
												  `field_text_font_style` varchar(25) NOT NULL DEFAULT 'normal',
												  `field_text_font_size` varchar(11) DEFAULT '',
												  `field_text_font_color` varchar(11) DEFAULT '',
												  `border_form_width` int(11) NOT NULL DEFAULT '1',
												  `border_form_style` varchar(11) NOT NULL DEFAULT 'solid',
												  `border_form_color` varchar(11) DEFAULT '',
												  `border_guidelines_width` int(11) NOT NULL DEFAULT '1',
												  `border_guidelines_style` varchar(11) NOT NULL DEFAULT 'solid',
												  `border_guidelines_color` varchar(11) DEFAULT '',
												  `border_section_width` int(11) NOT NULL DEFAULT '1',
												  `border_section_style` varchar(11) NOT NULL DEFAULT 'solid',
												  `border_section_color` varchar(11) DEFAULT '',
												  `form_shadow_style` varchar(25) NOT NULL DEFAULT 'WarpShadow',
												  `form_shadow_size` varchar(11) NOT NULL DEFAULT 'large',
												  `form_shadow_brightness` varchar(11) NOT NULL DEFAULT 'normal',
												  `form_button_type` varchar(11) NOT NULL DEFAULT 'text',
												  `form_button_text` varchar(100) NOT NULL DEFAULT 'Submit',
												  `form_button_image` text,
												  `advanced_css` text,
												  PRIMARY KEY (`theme_id`),
												  KEY `theme_name` (`theme_name`)
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function populate_ap_form_themes_table($dbh){
		
		$query = "INSERT INTO `".MF_TABLE_PREFIX."form_themes` (`theme_id`, `user_id`, `status`, `theme_has_css`, `theme_name`, `theme_built_in`, `theme_is_private`, `logo_type`, `logo_custom_image`, `logo_custom_height`, `logo_default_image`, `logo_default_repeat`, `wallpaper_bg_type`, `wallpaper_bg_color`, `wallpaper_bg_pattern`, `wallpaper_bg_custom`, `header_bg_type`, `header_bg_color`, `header_bg_pattern`, `header_bg_custom`, `form_bg_type`, `form_bg_color`, `form_bg_pattern`, `form_bg_custom`, `highlight_bg_type`, `highlight_bg_color`, `highlight_bg_pattern`, `highlight_bg_custom`, `guidelines_bg_type`, `guidelines_bg_color`, `guidelines_bg_pattern`, `guidelines_bg_custom`, `field_bg_type`, `field_bg_color`, `field_bg_pattern`, `field_bg_custom`, `form_title_font_type`, `form_title_font_weight`, `form_title_font_style`, `form_title_font_size`, `form_title_font_color`, `form_desc_font_type`, `form_desc_font_weight`, `form_desc_font_style`, `form_desc_font_size`, `form_desc_font_color`, `field_title_font_type`, `field_title_font_weight`, `field_title_font_style`, `field_title_font_size`, `field_title_font_color`, `guidelines_font_type`, `guidelines_font_weight`, `guidelines_font_style`, `guidelines_font_size`, `guidelines_font_color`, `section_title_font_type`, `section_title_font_weight`, `section_title_font_style`, `section_title_font_size`, `section_title_font_color`, `section_desc_font_type`, `section_desc_font_weight`, `section_desc_font_style`, `section_desc_font_size`, `section_desc_font_color`, `field_text_font_type`, `field_text_font_weight`, `field_text_font_style`, `field_text_font_size`, `field_text_font_color`, `border_form_width`, `border_form_style`, `border_form_color`, `border_guidelines_width`, `border_guidelines_style`, `border_guidelines_color`, `border_section_width`, `border_section_style`, `border_section_color`, `form_shadow_style`, `form_shadow_size`, `form_shadow_brightness`, `form_button_type`, `form_button_text`, `form_button_image`, `advanced_css`)
VALUES
	(1,1,1,0,'Green Senegal',1,1,'default','http://',40,'machform.png',0,'color','#cfdfc5','','','color','#bad4a9','','','color','#ffffff','','','color','#ecf1ea','','','color','#ecf1ea','','','color','#cfdfc5','','','Philosopher',700,'normal','','#80af1b','Philosopher',400,'normal','100%','#80af1b','Philosopher',700,'normal','110%','#80af1b','Ubuntu',400,'normal','','#666666','Philosopher',700,'normal','110%','#80af1b','Philosopher',400,'normal','95%','#80af1b','Ubuntu',400,'normal','','#666666',0,'solid','#bad4a9',1,'dashed','#bad4a9',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(2,1,1,0,'Blue Bigbird',1,1,'default','http://',40,'machform.png',0,'color','#336699','','','color','#6699cc','','','color','#ffffff','','','color','#ccdced','','','color','#6699cc','','','color','#FBFBFB','','','Open Sans',600,'normal','','','Open Sans',400,'normal','','','Open Sans',700,'normal','100%','','Ubuntu',400,'normal','80%','#ffffff','Open Sans',600,'normal','','','Open Sans',400,'normal','95%','','Open Sans',400,'normal','','',0,'solid','#336699',1,'dotted','#6699cc',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(3,1,1,0,'Blue Pionus',1,1,'default','http://',40,'machform.png',0,'color','#556270','','','color','#6b7b8c','','','color','#ffffff','','','color','#99aec4','','','color','#6b7b8c','','','color','#FBFBFB','','','Istok Web',400,'normal','170%','','Maven Pro',400,'normal','100%','','Istok Web',700,'normal','100%','','Maven Pro',400,'normal','95%','#ffffff','Istok Web',400,'normal','110%','','Maven Pro',400,'normal','95%','','Maven Pro',400,'normal','','',0,'solid','#556270',1,'solid','#6b7b8c',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(4,1,1,0,'Brown Conure',1,1,'default','http://',40,'machform.png',0,'pattern','#948c75','pattern_036.gif','','color','#b3a783','','','color','#ffffff','','','color','#e0d0a2','','','color','#948c75','','','color','#f0f0d8','pattern_036.gif','','Molengo',400,'normal','170%','','Molengo',400,'normal','110%','','Molengo',400,'normal','110%','','Nobile',400,'normal','','#ececec','Molengo',400,'normal','130%','','Molengo',400,'normal','100%','','Molengo',400,'normal','110%','',0,'solid','#948c75',1,'solid','#948c75',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(5,1,1,0,'Yellow Lovebird',1,1,'default','http://',40,'machform.png',0,'color','#f0d878','','','color','#edb817','','','color','#ffffff','','','color','#f5d678','','','color','#f7c52e','','','color','#FBFBFB','','','Amaranth',700,'normal','170%','','Amaranth',400,'normal','100%','','Amaranth',700,'normal','100%','','Amaranth',400,'normal','','#444444','Amaranth',400,'normal','110%','','Amaranth',400,'normal','95%','','Amaranth',400,'normal','100%','',0,'solid','#f0d878',1,'solid','#f7c52e',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(6,1,1,0,'Pink Starling',1,1,'default','http://',40,'machform.png',0,'color','#ff6699','','','color','#d93280','','','color','#ffffff','','','color','#ffd0d4','','','color','#f9fad2','','','color','#FBFBFB','','','Josefin Sans',600,'normal','160%','','Josefin Sans',400,'normal','110%','','Josefin Sans',700,'normal','110%','','Josefin Sans',600,'normal','100%','','Josefin Sans',700,'normal','','','Josefin Sans',400,'normal','110%','','Josefin Sans',400,'normal','130%','',0,'solid','#ff6699',1,'dashed','#f56990',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(8,1,1,0,'Red Rabbit',1,1,'default','http://',40,'machform.png',0,'color','#a40802','','','color','#800e0e','','','color','#ffffff','','','color','#ffa4a0','','','color','#800e0e','','','color','#FBFBFB','','','Lobster',400,'normal','','#000000','Ubuntu',400,'normal','100%','#000000','Lobster',400,'normal','110%','#222222','Ubuntu',400,'normal','85%','#ffffff','Lobster',400,'normal','130%','#000000','Ubuntu',400,'normal','95%','#000000','Ubuntu',400,'normal','','#333333',0,'solid','#a40702',1,'solid','#800e0e',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(9,1,1,0,'Orange Robin',1,1,'default','http://',40,'machform.png',0,'color','#f38430','','','color','#fa6800','','','color','#ffffff','','','color','#a7dbd8','','','color','#e0e4cc','','','color','#FBFBFB','','','Lucida Grande',400,'normal','','#000000','Nobile',400,'normal','','#000000','Nobile',700,'normal','','#000000','Lucida Grande',400,'normal','','#444444','Nobile',700,'normal','100%','#000000','Nobile',400,'normal','','#000000','Nobile',400,'normal','95%','#333333',0,'solid','#f38430',1,'solid','#e0e4cc',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(10,1,1,0,'Orange Sunbird',1,1,'default','http://',40,'machform.png',0,'color','#d95c43','','','color','#c02942','','','color','#ffffff','','','color','#d95c43','','','color','#53777a','','','color','#FBFBFB','','','Lucida Grande',400,'normal','','#000000','Lucida Grande',400,'normal','','#000000','Lucida Grande',700,'normal','','#222222','Lucida Grande',400,'normal','','#ffffff','Lucida Grande',400,'normal','','#000000','Lucida Grande',400,'normal','','#000000','Lucida Grande',400,'normal','','#333333',0,'solid','#d95c43',1,'solid','#53777a',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(11,1,1,0,'Green Ringneck',1,1,'default','http://',40,'machform.png',0,'color','#0b486b','','','color','#3b8686','','','color','#ffffff','','','color','#cff09e','','','color','#79bd9a','','','color','#a8dba8','','','Delius Swash Caps',400,'normal','','#000000','Delius Swash Caps',400,'normal','100%','#000000','Delius Swash Caps',400,'normal','100%','#222222','Delius',400,'normal','85%','#ffffff','Delius Swash Caps',400,'normal','','#000000','Delius Swash Caps',400,'normal','95%','#000000','Delius',400,'normal','','#515151',0,'solid','#0b486b',1,'solid','#79bd9a',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(12,1,1,0,'Brown Finch',1,1,'default','http://',40,'machform.png',0,'color','#774f38','','','color','#e08e79','','','color','#ffffff','','','color','#ece5ce','','','color','#c5e0dc','','','color','#f9fad2','','','Arvo',700,'normal','','#000000','Arvo',400,'normal','','#000000','Arvo',700,'normal','','#222222','Arvo',400,'normal','','#444444','Arvo',400,'normal','','#000000','Arvo',400,'normal','85%','#000000','Arvo',400,'normal','','#333333',0,'solid','#774f38',1,'dashed','#e08e79',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(14,1,1,0,'Brown Macaw',1,1,'default','http://',40,'machform.png',0,'color','#413e4a','','','color','#73626e','','','pattern','#ffffff','pattern_022.gif','','color','#f0b49e','','','color','#b38184','','','color','#FBFBFB','','','Cabin',500,'normal','160%','#000000','Cabin',400,'normal','100%','#000000','Cabin',700,'normal','110%','#222222','Lucida Grande',400,'normal','','#ececec','Cabin',600,'normal','','#000000','Cabin',600,'normal','95%','#000000','Cabin',400,'normal','110%','#333333',0,'solid','#413e4a',1,'dotted','#ff9900',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(15,1,1,0,'Pink Thrush',1,1,'default','http://',40,'machform.png',0,'color','#ff9f9d','','','color','#ff3d7e','','','color','#ffffff','','','color','#7fc7af','','','color','#3fb8b0','','','color','#FBFBFB','','','Crafty Girls',400,'normal','','#000000','Crafty Girls',400,'normal','100%','#000000','Crafty Girls',400,'normal','100%','#222222','Nobile',400,'normal','80%','#ffffff','Crafty Girls',400,'normal','','#000000','Crafty Girls',400,'normal','95%','#000000','Molengo',400,'normal','110%','#333333',0,'solid','#ff9f9d',1,'solid','#3fb8b0',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(16,1,1,0,'Yellow Bulbul',1,1,'default','http://',40,'machform.png',0,'color','#f8f4d7','','','color','#f4b26c','','','color','#f4dec2','','','color','#f2b4a7','','','color','#e98976','','','color','#FBFBFB','','','Special Elite',400,'normal','','#000000','Special Elite',400,'normal','','#000000','Special Elite',400,'normal','95%','#222222','Cousine',400,'normal','80%','#ececec','Special Elite',400,'normal','','#000000','Special Elite',400,'normal','','#000000','Cousine',400,'normal','','#333333',0,'solid','#f8f4d7',1,'solid','#f4b26c',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(17,1,1,0,'Blue Canary',1,1,'default','http://',40,'machform.png',0,'color','#81a8b8','','','color','#a4bcc2','','','color','#ffffff','','','color','#e8f3f8','','','color','#dbe6ec','','','color','#FBFBFB','','','PT Sans',400,'normal','','#000000','PT Sans',400,'normal','100%','#000000','PT Sans',700,'normal','100%','#222222','PT Sans',400,'normal','','#666666','PT Sans',700,'normal','','#000000','PT Sans',400,'normal','100%','#000000','PT Sans',400,'normal','110%','#333333',0,'solid','#81a8b8',1,'dashed','#a4bcc2',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(18,1,1,0,'Red Mockingbird',1,1,'default','http://',40,'machform.png',0,'color','#6b0103','','','color','#a30005','','','color','#c21b01','','','color','#f03d02','','','color','#1c0113','','','color','#FBFBFB','','','Oswald',400,'normal','','#ffffff','Open Sans',400,'normal','','#ffffff','Oswald',400,'normal','95%','#ffffff','Open Sans',400,'normal','','#ececec','Oswald',400,'normal','','#ececec','Lucida Grande',400,'normal','','#ffffff','Open Sans',400,'normal','','#333333',0,'solid','#6b0103',1,'solid','#1c0113',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(13,1,1,0,'Green Sparrow',1,1,'default','http://',40,'machform.png',0,'color','#d1f2a5','','','color','#f56990','','','color','#ffffff','','','color','#ffc48c','','','color','#ffa080','','','color','#FBFBFB','','','Open Sans',400,'normal','','#000000','Open Sans',400,'normal','','#000000','Open Sans',700,'normal','','#222222','Ubuntu',400,'normal','85%','#f4fce8','Open Sans',600,'normal','','#000000','Open Sans',400,'normal','95%','#000000','Open Sans',400,'normal','','#333333',10,'solid','#f0fab4',1,'solid','#ffa080',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(21,1,1,0,'Purple Vanga',1,1,'default','http://',40,'machform.png',0,'color','#7b85e2','','','color','#7aa6d6','','','color','#d1e7f9','','','color','#7aa6d6','','','color','#fbfcd0','','','color','#FBFBFB','','','Droid Sans',400,'normal','160%','#444444','Droid Sans',400,'normal','95%','#444444','Open Sans',700,'normal','95%','#444444','Droid Sans',400,'normal','85%','#444444','Droid Sans',400,'normal','110%','#444444','Droid Sans',400,'normal','95%','#000000','Droid Sans',400,'normal','100%','#333333',0,'solid','#CCCCCC',1,'solid','#fbfcd0',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(22,1,1,0,'Purple Dove',1,1,'default','http://',40,'machform.png',0,'color','#c0addb','','','color','#a662de','','','pattern','#ffffff','pattern_044.gif','','color','#a662de','','','color','#a662de','','','color','#c0addb','','','Pacifico',400,'normal','180%','#000000','Open Sans',400,'normal','95%','#000000','Pacifico',400,'normal','95%','#222222','Open Sans',400,'normal','80%','#ececec','Pacifico',400,'normal','110%','#000000','Open Sans',400,'normal','95%','#000000','Open Sans',400,'normal','100%','#333333',0,'solid','#a662de',1,'dashed','#CCCCCC',1,'dashed','#a662de','StandShadow','large','dark','text','Submit','http://',''),
	(20,1,1,0,'Pink Flamingo',1,1,'default','http://',40,'machform.png',0,'color','#f87d7b','','','color','#5ea0a3','','','color','#ffffff','','','color','#fab97f','','','color','#dcd1b4','','','color','#FBFBFB','','','Lucida Grande',400,'normal','160%','#b05573','Lucida Grande',400,'normal','95%','#b05573','Lucida Grande',700,'normal','95%','#b05573','Lucida Grande',400,'normal','80%','#444444','Lucida Grande',400,'normal','110%','#b05573','Lucida Grande',400,'normal','85%','#b05573','Lucida Grande',400,'normal','100%','#333333',0,'solid','#f87d7b',1,'dotted','#fab97f',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
	(19,1,1,0,'Yellow Kiwi',1,1,'default','http://',40,'machform.png',0,'color','#ffe281','','','color','#ffbb7f','','','color','#eee9e5','','','color','#fad4b2','','','color','#ff9c97','','','color','#FBFBFB','','','Lucida Grande',400,'normal','160%','#000000','Lucida Grande',400,'normal','95%','#000000','Lucida Grande',700,'normal','95%','#222222','Lucida Grande',400,'normal','80%','#ffffff','Lucida Grande',400,'normal','110%','#000000','Lucida Grande',400,'normal','85%','#000000','Lucida Grande',400,'normal','100%','#333333',0,'solid','#ffe281',1,'solid','#CCCCCC',1,'dotted','#cdcdcd','WarpShadow','large','normal','text','Submit','http://','');";
			
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_fonts_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."fonts` (
											  `font_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
											  `font_origin` varchar(11) NOT NULL DEFAULT 'google',
											  `font_family` varchar(100) DEFAULT NULL,
											  `font_variants` text,
											  `font_variants_numeric` text,
											  PRIMARY KEY (`font_id`),
											  KEY `font_family` (`font_family`)
											) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function populate_ap_fonts_table($dbh){

		//truncate ap_fonts table
		$query = "TRUNCATE ".MF_TABLE_PREFIX."fonts";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		$query = "INSERT INTO `".MF_TABLE_PREFIX."fonts` (`font_id`, `font_origin`, `font_family`, `font_variants`, `font_variants_numeric`)
														VALUES
														(1,'google','Roboto','100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic','100,100-italic,300,300-italic,400,400-italic,500,500-italic,700,700-italic,900,900italic'),
														(2,'google','Open Sans','300,300italic,regular,italic,600,600italic,700,700italic,800,800italic','300,300-italic,400,400-italic,600,600-italic,700,700-italic,800,800-italic'),
														(3,'google','Noto Sans JP','100,300,regular,500,700,900','100,300,400,500,700,900'),
														(4,'google','Lato','100,100italic,300,300italic,regular,italic,700,700italic,900,900italic','100,100-italic,300,300-italic,400,400-italic,700,700-italic,900,900italic'),
														(5,'google','Montserrat','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(6,'google','Source Sans Pro','200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,900,900italic','200,200-italic,300,300-italic,400,400-italic,600,600-italic,700,700-italic,900,900italic'),
														(7,'google','Roboto Condensed','300,300italic,regular,italic,700,700italic','300,300-italic,400,400-italic,700,700-italic'),
														(8,'google','Oswald','200,300,regular,500,600,700','200,300,400,500,600,700'),
														(9,'google','Poppins','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(10,'google','Roboto Mono','100,200,300,regular,500,600,700,100italic,200italic,300italic,italic,500italic,600italic,700italic','100,200,300,400,500,600,700,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic'),
														(11,'google','Noto Sans','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(12,'google','Raleway','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(13,'google','PT Sans','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(14,'google','Roboto Slab','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(15,'google','Ubuntu','300,300italic,regular,italic,500,500italic,700,700italic','300,300-italic,400,400-italic,500,500-italic,700,700-italic'),
														(16,'google','Merriweather','300,300italic,regular,italic,700,700italic,900,900italic','300,300-italic,400,400-italic,700,700-italic,900,900italic'),
														(17,'google','Playfair Display','regular,500,600,700,800,900,italic,500italic,600italic,700italic,800italic,900italic','400,500,600,700,800,900,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(18,'google','Nunito','200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,800,800italic,900,900italic','200,200-italic,300,300-italic,400,400-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(19,'google','Open Sans Condensed','300,300italic,700','300,300-italic,700'),
														(20,'google','Noto Sans KR','100,300,regular,500,700,900','100,300,400,500,700,900'),
														(21,'google','Rubik','300,regular,500,600,700,800,900,300italic,italic,500italic,600italic,700italic,800italic,900italic','300,400,500,600,700,800,900,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(22,'google','Lora','regular,500,600,700,italic,500italic,600italic,700italic','400,500,600,700,400-italic,500-italic,600-italic,700-italic'),
														(23,'google','Mukta','200,300,regular,500,600,700,800','200,300,400,500,600,700,800'),
														(24,'google','Noto Sans TC','100,300,regular,500,700,900','100,300,400,500,700,900'),
														(25,'google','Fira Sans','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(26,'google','Hind Siliguri','300,regular,500,600,700','300,400,500,600,700'),
														(27,'google','Nunito Sans','200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,800,800italic,900,900italic','200,200-italic,300,300-italic,400,400-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(28,'google','Work Sans','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(29,'google','Nanum Gothic','regular,700,800','400,700,800'),
														(30,'google','Quicksand','300,regular,500,600,700','300,400,500,600,700'),
														(31,'google','PT Serif','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(32,'google','Titillium Web','200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,900','200,200-italic,300,300-italic,400,400-italic,600,600-italic,700,700-italic,900'),
														(33,'google','Inter','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(34,'google','Noto Serif','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(35,'google','Karla','200,300,regular,500,600,700,800,200italic,300italic,italic,500italic,600italic,700italic,800italic','200,300,400,500,600,700,800,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic'),
														(36,'google','Inconsolata','200,300,regular,500,600,700,800,900','200,300,400,500,600,700,800,900'),
														(37,'google','Barlow','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(38,'google','Heebo','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(39,'google','Bebas Neue','regular','400'),
														(40,'google','Oxygen','300,regular,700','300,400,700'),
														(41,'google','Yanone Kaffeesatz','200,300,regular,500,600,700','200,300,400,500,600,700'),
														(42,'google','Anton','regular','400'),
														(43,'google','Teko','300,regular,500,600,700','300,400,500,600,700'),
														(44,'google','PT Sans Narrow','regular,700','400,700'),
														(45,'google','Josefin Sans','100,200,300,regular,500,600,700,100italic,200italic,300italic,italic,500italic,600italic,700italic','100,200,300,400,500,600,700,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic'),
														(46,'google','Source Code Pro','200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,900,900italic','200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,900,900italic'),
														(47,'google','Arimo','regular,500,600,700,italic,500italic,600italic,700italic','400,500,600,700,400-italic,500-italic,600-italic,700-italic'),
														(48,'google','Libre Franklin','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(49,'google','Dosis','200,300,regular,500,600,700,800','200,300,400,500,600,700,800'),
														(50,'google','Libre Baskerville','regular,italic,700','400,400-italic,700'),
														(51,'google','Cabin','regular,500,600,700,italic,500italic,600italic,700italic','400,500,600,700,400-italic,500-italic,600-italic,700-italic'),
														(52,'google','Mulish','200,300,regular,500,600,700,800,900,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','200,300,400,500,600,700,800,900,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(53,'google','IBM Plex Sans','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(54,'google','Bitter','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(55,'google','Noto Sans SC','100,300,regular,500,700,900','100,300,400,500,700,900'),
														(56,'google','Padauk','regular,700','400,700'),
														(57,'google','Crimson Text','regular,italic,600,600italic,700,700italic','400,400-italic,600,600-italic,700,700-italic'),
														(58,'google','Dancing Script','regular,500,600,700','400,500,600,700'),
														(59,'google','Hind','300,regular,500,600,700','300,400,500,600,700'),
														(60,'google','Varela Round','regular','400'),
														(61,'google','Abel','regular','400'),
														(62,'google','Lobster','regular','400'),
														(63,'google','Cairo','200,300,regular,600,700,900','200,300,400,600,700,900'),
														(64,'google','Fjalla One','regular','400'),
														(65,'google','Prompt','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(66,'google','Source Serif Pro','200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,900,900italic','200,200-italic,300,300-italic,400,400-italic,600,600-italic,700,700-italic,900,900italic'),
														(67,'google','Barlow Condensed','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(68,'google','Noto Sans HK','100,300,regular,500,700,900','100,300,400,500,700,900'),
														(69,'google','Arvo','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(70,'google','Indie Flower','regular','400'),
														(71,'google','EB Garamond','regular,500,600,700,800,italic,500italic,600italic,700italic,800italic','400,500,600,700,800,400-italic,500-italic,600-italic,700-italic,800-italic'),
														(72,'google','Comfortaa','300,regular,500,600,700','300,400,500,600,700'),
														(73,'google','Zilla Slab','300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(74,'google','Kanit','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(75,'google','Pacifico','regular','400'),
														(76,'google','DM Sans','regular,italic,500,500italic,700,700italic','400,400-italic,500,500-italic,700,700-italic'),
														(77,'google','Staatliches','regular','400'),
														(78,'google','Exo 2','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(79,'google','Shadows Into Light','regular','400'),
														(80,'google','Hind Madurai','300,regular,500,600,700','300,400,500,600,700'),
														(81,'google','Merriweather Sans','300,regular,500,600,700,800,300italic,italic,500italic,600italic,700italic,800italic','300,400,500,600,700,800,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic'),
														(82,'google','Asap','regular,500,600,700,italic,500italic,600italic,700italic','400,500,600,700,400-italic,500-italic,600-italic,700-italic'),
														(83,'google','Overpass','100,100italic,200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(84,'google','Assistant','200,300,regular,500,600,700,800','200,300,400,500,600,700,800'),
														(85,'google','Cormorant Garamond','300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(86,'google','Questrial','regular','400'),
														(87,'google','Slabo 27px','regular','400'),
														(88,'google','Abril Fatface','regular','400'),
														(89,'google','Rajdhani','300,regular,500,600,700','300,400,500,600,700'),
														(90,'google','Noto Serif JP','200,300,regular,500,600,700,900','200,300,400,500,600,700,900'),
														(91,'google','Archivo Narrow','regular,italic,500,500italic,600,600italic,700,700italic','400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(92,'google','Exo','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(93,'google','Fira Sans Condensed','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(94,'google','Maven Pro','regular,500,600,700,800,900','400,500,600,700,800,900'),
														(95,'google','Caveat','regular,500,600,700','400,500,600,700'),
														(96,'google','Martel','200,300,regular,600,700,800,900','200,300,400,600,700,800,900'),
														(97,'google','IBM Plex Serif','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(98,'google','Domine','regular,500,600,700','400,500,600,700'),
														(99,'google','Amatic SC','regular,700','400,700'),
														(100,'google','Catamaran','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(101,'google','Tajawal','200,300,regular,500,700,800,900','200,300,400,500,700,800,900'),
														(102,'google','Bree Serif','regular','400'),
														(103,'google','Antic Slab','regular','400'),
														(104,'google','Play','regular,700','400,700'),
														(105,'google','Architects Daughter','regular','400'),
														(106,'google','Sarabun','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic'),
														(107,'google','Manrope','200,300,regular,500,600,700,800','200,300,400,500,600,700,800'),
														(108,'google','Alfa Slab One','regular','400'),
														(109,'google','Acme','regular','400'),
														(110,'google','Nanum Myeongjo','regular,700,800','400,700,800'),
														(111,'google','Righteous','regular','400'),
														(112,'google','M PLUS Rounded 1c','100,300,regular,500,700,800,900','100,300,400,500,700,800,900'),
														(113,'google','Fredoka One','regular','400'),
														(114,'google','Signika','300,regular,500,600,700','300,400,500,600,700'),
														(115,'google','Satisfy','regular','400'),
														(116,'google','Cinzel','regular,500,600,700,800,900','400,500,600,700,800,900'),
														(117,'google','Barlow Semi Condensed','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(118,'google','Archivo','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(119,'google','Patrick Hand','regular','400'),
														(120,'google','Vollkorn','regular,500,600,700,800,900,italic,500italic,600italic,700italic,800italic,900italic','400,500,600,700,800,900,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(121,'google','Crete Round','regular,italic','400,400-italic'),
														(122,'google','Patua One','regular','400'),
														(123,'google','ABeeZee','regular,italic','400,400-italic'),
														(124,'google','Almarai','300,regular,700,800','300,400,700,800'),
														(125,'google','Monda','regular,700','400,700'),
														(126,'google','Amiri','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(127,'google','Permanent Marker','regular','400'),
														(128,'google','Balsamiq Sans','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(129,'google','Alegreya Sans','100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,800,800italic,900,900italic','100,100-italic,300,300-italic,400,400-italic,500,500-italic,700,700-italic,800,800-italic,900,900italic'),
														(130,'google','Ubuntu Condensed','regular','400'),
														(131,'google','Courgette','regular','400'),
														(132,'google','M PLUS 1p','100,300,regular,500,700,800,900','100,300,400,500,700,800,900'),
														(133,'google','Tinos','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(134,'google','Spartan','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(135,'google','Kaushan Script','regular','400'),
														(136,'google','Alegreya','regular,500,600,700,800,900,italic,500italic,600italic,700italic,800italic,900italic','400,500,600,700,800,900,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(137,'google','Lobster Two','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(138,'google','Jost','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(139,'google','Frank Ruhl Libre','300,regular,500,700,900','300,400,500,700,900'),
														(140,'google','Great Vibes','regular','400'),
														(141,'google','PT Sans Caption','regular,700','400,700'),
														(142,'google','Archivo Black','regular','400'),
														(143,'google','Hammersmith One','regular','400'),
														(144,'google','Yantramanav','100,300,regular,500,700,900','100,300,400,500,700,900'),
														(145,'google','Cardo','regular,italic,700','400,400-italic,700'),
														(146,'google','Saira Condensed','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(147,'google','Chivo','300,300italic,regular,italic,700,700italic,900,900italic','300,300-italic,400,400-italic,700,700-italic,900,900italic'),
														(148,'google','Kalam','300,regular,700','300,400,700'),
														(149,'google','Red Hat Display','regular,italic,500,500italic,700,700italic,900,900italic','400,400-italic,500,500-italic,700,700-italic,900,900italic'),
														(150,'google','Sacramento','regular','400'),
														(151,'google','Prata','regular','400'),
														(152,'google','Signika Negative','300,regular,600,700','300,400,600,700'),
														(153,'google','Chakra Petch','300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(154,'google','Francois One','regular','400'),
														(155,'google','IBM Plex Mono','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(156,'google','Russo One','regular','400'),
														(157,'google','Gothic A1','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(158,'google','Quattrocento Sans','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(159,'google','Baloo 2','regular,500,600,700,800','400,500,600,700,800'),
														(160,'google','Spectral','200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic','200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic'),
														(161,'google','Parisienne','regular','400'),
														(162,'google','Cantarell','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(163,'google','Orbitron','regular,500,600,700,800,900','400,500,600,700,800,900'),
														(164,'google','Encode Sans','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(165,'google','Secular One','regular','400'),
														(166,'google','Public Sans','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(167,'google','Cuprum','regular,500,600,700,italic,500italic,600italic,700italic','400,500,600,700,400-italic,500-italic,600-italic,700-italic'),
														(168,'google','Noticia Text','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(169,'google','Volkhov','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(170,'google','Didact Gothic','regular','400'),
														(171,'google','Old Standard TT','regular,italic,700','400,400-italic,700'),
														(172,'google','Gloria Hallelujah','regular','400'),
														(173,'google','Pathway Gothic One','regular','400'),
														(174,'google','Bangers','regular','400'),
														(175,'google','Concert One','regular','400'),
														(176,'google','Rokkitt','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(177,'google','Asap Condensed','regular,italic,500,500italic,600,600italic,700,700italic','400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(178,'google','News Cycle','regular,700','400,700'),
														(179,'google','Ropa Sans','regular,italic','400,400-italic'),
														(180,'google','DM Serif Display','regular,italic','400,400-italic'),
														(181,'google','Press Start 2P','regular','400'),
														(182,'google','Passion One','regular,700,900','400,700,900'),
														(183,'google','Gentium Book Basic','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(184,'google','Sigmar One','regular','400'),
														(185,'google','Hind Guntur','300,regular,500,600,700','300,400,500,600,700'),
														(186,'google','Changa','200,300,regular,500,600,700,800','200,300,400,500,600,700,800'),
														(187,'google','Monoton','regular','400'),
														(188,'google','Sawarabi Mincho','regular','400'),
														(189,'google','Quattrocento','regular,700','400,700'),
														(190,'google','Vidaloka','regular','400'),
														(191,'google','Josefin Slab','100,200,300,regular,500,600,700,100italic,200italic,300italic,italic,500italic,600italic,700italic','100,200,300,400,500,600,700,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic'),
														(192,'google','Faustina','regular,500,600,700,italic,500italic,600italic,700italic','400,500,600,700,400-italic,500-italic,600-italic,700-italic'),
														(193,'google','Ultra','regular','400'),
														(194,'google','Playfair Display SC','regular,italic,700,700italic,900,900italic','400,400-italic,700,700-italic,900,900italic'),
														(195,'google','Poiret One','regular','400'),
														(196,'google','Cookie','regular','400'),
														(197,'google','Unna','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(198,'google','Sanchez','regular,italic','400,400-italic'),
														(199,'google','Special Elite','regular','400'),
														(200,'google','Taviraj','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(201,'google','Yellowtail','regular','400'),
														(202,'google','Noto Serif TC','200,300,regular,500,600,700,900','200,300,400,500,600,700,900'),
														(203,'google','Bai Jamjuree','200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(204,'google','Cormorant','300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(205,'google','Istok Web','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(206,'google','Merienda','regular,700','400,700'),
														(207,'google','Montserrat Alternates','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(208,'google','Neuton','200,300,regular,italic,700,800','200,300,400,400-italic,700,800'),
														(209,'google','Luckiest Guy','regular','400'),
														(210,'google','Philosopher','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(211,'google','Advent Pro','100,200,300,regular,500,600,700','100,200,300,400,500,600,700'),
														(212,'google','Saira','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(213,'google','Arapey','regular,italic','400,400-italic'),
														(214,'google','BenchNine','300,regular,700','300,400,700'),
														(215,'google','Handlee','regular','400'),
														(216,'google','Fira Sans Extra Condensed','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(217,'google','Ubuntu Mono','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(218,'google','Stint Ultra Condensed','regular','400'),
														(219,'google','Sen','regular,700,800','400,700,800'),
														(220,'google','Neucha','regular','400'),
														(221,'google','Lusitana','regular,700','400,700'),
														(222,'google','Paytone One','regular','400'),
														(223,'google','Space Mono','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(224,'google','Khand','300,regular,500,600,700','300,400,500,600,700'),
														(225,'google','Playball','regular','400'),
														(226,'google','Pragati Narrow','regular,700','400,700'),
														(227,'google','Crimson Pro','200,300,regular,500,600,700,800,900,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','200,300,400,500,600,700,800,900,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(228,'google','Rock Salt','regular','400'),
														(229,'google','PT Mono','regular','400'),
														(230,'google','Hind Vadodara','300,regular,500,600,700','300,400,500,600,700'),
														(231,'google','Mitr','200,300,regular,500,600,700','200,300,400,500,600,700'),
														(232,'google','Economica','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(233,'google','Cabin Condensed','regular,500,600,700','400,500,600,700'),
														(234,'google','Tangerine','regular,700','400,700'),
														(235,'google','Gudea','regular,italic,700','400,400-italic,700'),
														(236,'google','Actor','regular','400'),
														(237,'google','Ruda','regular,500,600,700,800,900','400,500,600,700,800,900'),
														(238,'google','Marcellus','regular','400'),
														(239,'google','Unica One','regular','400'),
														(240,'google','Karma','300,regular,500,600,700','300,400,500,600,700'),
														(241,'google','Alice','regular','400'),
														(242,'google','Sawarabi Gothic','regular','400'),
														(243,'google','Homemade Apple','regular','400'),
														(244,'google','Allura','regular','400'),
														(245,'google','El Messiri','regular,500,600,700','400,500,600,700'),
														(246,'google','Saira Semi Condensed','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(247,'google','Gentium Basic','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(248,'google','Alata','regular','400'),
														(249,'google','Viga','regular','400'),
														(250,'google','Alef','regular,700','400,700'),
														(251,'google','Marck Script','regular','400'),
														(252,'google','Mate SC','regular','400'),
														(253,'google','Pontano Sans','regular','400'),
														(254,'google','Do Hyeon','regular','400'),
														(255,'google','Cutive Mono','regular','400'),
														(256,'google','Jura','300,regular,500,600,700','300,400,500,600,700'),
														(257,'google','Noto Serif KR','200,300,regular,500,600,700,900','200,300,400,500,600,700,900'),
														(258,'google','Adamina','regular','400'),
														(259,'google','Amaranth','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(260,'google','Encode Sans Condensed','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(261,'google','Antic','regular','400'),
														(262,'google','Julius Sans One','regular','400'),
														(263,'google','Fugaz One','regular','400'),
														(264,'google','Carter One','regular','400'),
														(265,'google','Aclonica','regular','400'),
														(266,'google','Armata','regular','400'),
														(267,'google','Aleo','300,300italic,regular,italic,700,700italic','300,300-italic,400,400-italic,700,700-italic'),
														(268,'google','Palanquin','100,200,300,regular,500,600,700','100,200,300,400,500,600,700'),
														(269,'google','Nanum Gothic Coding','regular,700','400,700'),
														(270,'google','Nanum Pen Script','regular','400'),
														(271,'google','Bad Script','regular','400'),
														(272,'google','DM Serif Text','regular,italic','400,400-italic'),
														(273,'google','Khula','300,regular,600,700,800','300,400,600,700,800'),
														(274,'google','Audiowide','regular','400'),
														(275,'google','Itim','regular','400'),
														(276,'google','Noto Serif SC','200,300,regular,500,600,700,900','200,300,400,500,600,700,900'),
														(277,'google','Yeseva One','regular','400'),
														(278,'google','Knewave','regular','400'),
														(279,'google','Syncopate','regular,700','400,700'),
														(280,'google','Quantico','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(281,'google','Tenor Sans','regular','400'),
														(282,'google','Electrolize','regular','400'),
														(283,'google','Nothing You Could Do','regular','400'),
														(284,'google','Mali','200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(285,'google','Abhaya Libre','regular,500,600,700,800','400,500,600,700,800'),
														(286,'google','Markazi Text','regular,500,600,700','400,500,600,700'),
														(287,'google','Pangolin','regular','400'),
														(288,'google','Recursive','300,regular,500,600,700,800,900','300,400,500,600,700,800,900'),
														(289,'google','Varela','regular','400'),
														(290,'google','Alex Brush','regular','400'),
														(291,'google','Gochi Hand','regular','400'),
														(292,'google','Baloo Tammudu 2','regular,500,600,700,800','400,500,600,700,800'),
														(293,'google','Jaldi','regular,700','400,700'),
														(294,'google','Rufina','regular,700','400,700'),
														(295,'google','Mr Dafoe','regular','400'),
														(296,'google','Arima Madurai','100,200,300,regular,500,700,800,900','100,200,300,400,500,700,800,900'),
														(297,'google','Kosugi Maru','regular','400'),
														(298,'google','Damion','regular','400'),
														(299,'google','Gelasio','regular,italic,500,500italic,600,600italic,700,700italic','400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(300,'google','Shadows Into Light Two','regular','400'),
														(301,'google','Sarala','regular,700','400,700'),
														(302,'google','Cousine','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(303,'google','Sorts Mill Goudy','regular,italic','400,400-italic'),
														(304,'google','Cantata One','regular','400'),
														(305,'google','Share Tech Mono','regular','400'),
														(306,'google','Basic','regular','400'),
														(307,'google','Coda Caption','800','800'),
														(308,'google','Saira Extra Condensed','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(309,'google','Squada One','regular','400'),
														(310,'google','Mandali','regular','400'),
														(311,'google','Niconne','regular','400'),
														(312,'google','Oleo Script','regular,700','400,700'),
														(313,'google','Eczar','regular,500,600,700,800','400,500,600,700,800'),
														(314,'google','Gruppo','regular','400'),
														(315,'google','Rancho','regular','400'),
														(316,'google','Martel Sans','200,300,regular,600,700,800,900','200,300,400,600,700,800,900'),
														(317,'google','Bungee','regular','400'),
														(318,'google','Berkshire Swash','regular','400'),
														(319,'google','Days One','regular','400'),
														(320,'google','Yrsa','300,regular,500,600,700','300,400,500,600,700'),
														(321,'google','Fira Mono','regular,500,700','400,500,700'),
														(322,'google','Courier Prime','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(323,'google','Pridi','200,300,regular,500,600,700','200,300,400,500,600,700'),
														(324,'google','Coda','regular,800','400,800'),
														(325,'google','Pinyon Script','regular','400'),
														(326,'google','Average','regular','400'),
														(327,'google','Lilita One','regular','400'),
														(328,'google','Suez One','regular','400'),
														(329,'google','Caveat Brush','regular','400'),
														(330,'google','Black Ops One','regular','400'),
														(331,'google','Sriracha','regular','400'),
														(332,'google','Spinnaker','regular','400'),
														(333,'google','Sintony','regular,700','400,700'),
														(334,'google','Michroma','regular','400'),
														(335,'google','Red Hat Text','regular,italic,500,500italic,700,700italic','400,400-italic,500,500-italic,700,700-italic'),
														(336,'google','Voltaire','regular','400'),
														(337,'google','Glegoo','regular,700','400,700'),
														(338,'google','Allan','regular,700','400,700'),
														(339,'google','Alegreya Sans SC','100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,800,800italic,900,900italic','100,100-italic,300,300-italic,400,400-italic,500,500-italic,700,700-italic,800,800-italic,900,900italic'),
														(340,'google','Six Caps','regular','400'),
														(341,'google','Enriqueta','regular,500,600,700','400,500,600,700'),
														(342,'google','Chewy','regular','400'),
														(343,'google','Shrikhand','regular','400'),
														(344,'google','Lalezar','regular','400'),
														(345,'google','Bowlby One SC','regular','400'),
														(346,'google','Lexend Deca','regular','400'),
														(347,'google','Mukta Malar','200,300,regular,500,600,700,800','200,300,400,500,600,700,800'),
														(348,'google','Overpass Mono','300,regular,600,700','300,400,600,700'),
														(349,'google','Reenie Beanie','regular','400'),
														(350,'google','Capriola','regular','400'),
														(351,'google','Overlock','regular,italic,700,700italic,900,900italic','400,400-italic,700,700-italic,900,900italic'),
														(352,'google','Allerta','regular','400'),
														(353,'google','Candal','regular','400'),
														(354,'google','Boogaloo','regular','400'),
														(355,'google','Krub','200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(356,'google','Italianno','regular','400'),
														(357,'google','Kreon','300,regular,500,600,700','300,400,500,600,700'),
														(358,'google','Arsenal','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(359,'google','Reem Kufi','regular','400'),
														(360,'google','Mate','regular,italic','400,400-italic'),
														(361,'google','Rambla','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(362,'google','Mukta Vaani','200,300,regular,500,600,700,800','200,300,400,500,600,700,800'),
														(363,'google','Fredericka the Great','regular','400'),
														(364,'google','Mada','200,300,regular,500,600,700,900','200,300,400,500,600,700,900'),
														(365,'google','Covered By Your Grace','regular','400'),
														(366,'google','Bevan','regular','400'),
														(367,'google','Forum','regular','400'),
														(368,'google','Kameron','regular,700','400,700'),
														(369,'google','Lemonada','300,regular,500,600,700','300,400,500,600,700'),
														(370,'google','Rubik Mono One','regular','400'),
														(371,'google','PT Serif Caption','regular,italic','400,400-italic'),
														(372,'google','Black Han Sans','regular','400'),
														(373,'google','Niramit','200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(374,'google','Lateef','regular','400'),
														(375,'google','Anonymous Pro','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(376,'google','Cabin Sketch','regular,700','400,700'),
														(377,'google','Norican','regular','400'),
														(378,'google','Goudy Bookletter 1911','regular','400'),
														(379,'google','Annie Use Your Telescope','regular','400'),
														(380,'google','Baloo Tamma 2','regular,500,600,700,800','400,500,600,700,800'),
														(381,'google','Sansita','regular,italic,700,700italic,800,800italic,900,900italic','400,400-italic,700,700-italic,800,800-italic,900,900italic'),
														(382,'google','Just Another Hand','regular','400'),
														(383,'google','Literata','200,300,regular,500,600,700,800,900,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','200,300,400,500,600,700,800,900,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(384,'google','VT323','regular','400'),
														(385,'google','Mallanna','regular','400'),
														(386,'google','Aldrich','regular','400'),
														(387,'google','Londrina Solid','100,300,regular,900','100,300,400,900'),
														(388,'google','Nobile','regular,italic,500,500italic,700,700italic','400,400-italic,500,500-italic,700,700-italic'),
														(389,'google','Trirong','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(390,'google','Titan One','regular','400'),
														(391,'google','Mountains of Christmas','regular,700','400,700'),
														(392,'google','Scheherazade','regular,700','400,700'),
														(393,'google','Cinzel Decorative','regular,700,900','400,700,900'),
														(394,'google','Telex','regular','400'),
														(395,'google','Bubblegum Sans','regular','400'),
														(396,'google','Rye','regular','400'),
														(397,'google','Yesteryear','regular','400'),
														(398,'google','Holtwood One SC','regular','400'),
														(399,'google','Laila','300,regular,500,600,700','300,400,500,600,700'),
														(400,'google','Arbutus Slab','regular','400'),
														(401,'google','Charm','regular,700','400,700'),
														(402,'google','Molengo','regular','400'),
														(403,'google','Seaweed Script','regular','400'),
														(404,'google','Changa One','regular,italic','400,400-italic'),
														(405,'google','Miriam Libre','regular,700','400,700'),
														(406,'google','Ovo','regular','400'),
														(407,'google','Pattaya','regular','400'),
														(408,'google','Racing Sans One','regular','400'),
														(409,'google','Herr Von Muellerhoff','regular','400'),
														(410,'google','Caudex','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(411,'google','Darker Grotesque','300,regular,500,600,700,800,900','300,400,500,600,700,800,900'),
														(412,'google','Gilda Display','regular','400'),
														(413,'google','Arizonia','regular','400'),
														(414,'google','Athiti','200,300,regular,500,600,700','200,300,400,500,600,700'),
														(415,'google','Rochester','regular','400'),
														(416,'google','Corben','regular,700','400,700'),
														(417,'google','Nixie One','regular','400'),
														(418,'google','Ramabhadra','regular','400'),
														(419,'google','Biryani','200,300,regular,600,700,800,900','200,300,400,600,700,800,900'),
														(420,'google','Mrs Saint Delafield','regular','400'),
														(421,'google','Bungee Inline','regular','400'),
														(422,'google','Judson','regular,italic,700','400,400-italic,700'),
														(423,'google','Jua','regular','400'),
														(424,'google','Kristi','regular','400'),
														(425,'google','Alegreya SC','regular,italic,500,500italic,700,700italic,800,800italic,900,900italic','400,400-italic,500,500-italic,700,700-italic,800,800-italic,900,900italic'),
														(426,'google','Leckerli One','regular','400'),
														(427,'google','Average Sans','regular','400'),
														(428,'google','Share','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(429,'google','Coming Soon','regular','400'),
														(430,'google','Delius','regular','400'),
														(431,'google','Amita','regular,700','400,700'),
														(432,'google','KoHo','200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(433,'google','Oranienbaum','regular','400'),
														(434,'google','Nanum Brush Script','regular','400'),
														(435,'google','Krona One','regular','400'),
														(436,'google','Creepster','regular','400'),
														(437,'google','Scada','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(438,'google','Comic Neue','300,300italic,regular,italic,700,700italic','300,300-italic,400,400-italic,700,700-italic'),
														(439,'google','Allerta Stencil','regular','400'),
														(440,'google','Graduate','regular','400'),
														(441,'google','Trocchi','regular','400'),
														(442,'google','Copse','regular','400'),
														(443,'google','Alatsi','regular','400'),
														(444,'google','Rozha One','regular','400'),
														(445,'google','Cedarville Cursive','regular','400'),
														(446,'google','Averia Serif Libre','300,300italic,regular,italic,700,700italic','300,300-italic,400,400-italic,700,700-italic'),
														(447,'google','Chonburi','regular','400'),
														(448,'google','Sora','100,200,300,regular,500,600,700,800','100,200,300,400,500,600,700,800'),
														(449,'google','IBM Plex Sans Condensed','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(450,'google','Contrail One','regular','400'),
														(451,'google','Lustria','regular','400'),
														(452,'google','Jockey One','regular','400'),
														(453,'google','Marcellus SC','regular','400'),
														(454,'google','Kosugi','regular','400'),
														(455,'google','Coustard','regular,900','400,900'),
														(456,'google','Epilogue','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(457,'google','GFS Didot','regular','400'),
														(458,'google','Palanquin Dark','regular,500,600,700','400,500,600,700'),
														(459,'google','Sunflower','300,500,700','300,500,700'),
														(460,'google','Halant','300,regular,500,600,700','300,400,500,600,700'),
														(461,'google','Carme','regular','400'),
														(462,'google','Fauna One','regular','400'),
														(463,'google','Maitree','200,300,regular,500,600,700','200,300,400,500,600,700'),
														(464,'google','Big Shoulders Display','100,300,regular,500,600,700,800,900','100,300,400,500,600,700,800,900'),
														(465,'google','Belgrano','regular','400'),
														(466,'google','Suranna','regular','400'),
														(467,'google','Mr De Haviland','regular','400'),
														(468,'google','Carrois Gothic','regular','400'),
														(469,'google','Magra','regular,700','400,700'),
														(470,'google','Petit Formal Script','regular','400'),
														(471,'google','Belleza','regular','400'),
														(472,'google','Rosario','300,regular,500,600,700,300italic,italic,500italic,600italic,700italic','300,400,500,600,700,300-italic,400-italic,500-italic,600-italic,700-italic'),
														(473,'google','Podkova','regular,500,600,700,800','400,500,600,700,800'),
														(474,'google','Schoolbell','regular','400'),
														(475,'google','Grand Hotel','regular','400'),
														(476,'google','La Belle Aurore','regular','400'),
														(477,'google','Be Vietnam','100,100italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic','100,100-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic'),
														(478,'google','Amiko','regular,600,700','400,600,700'),
														(479,'google','Radley','regular,italic','400,400-italic'),
														(480,'google','Wallpoet','regular','400'),
														(481,'google','Farro','300,regular,500,700','300,400,500,700'),
														(482,'google','Marvel','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(483,'google','Merienda One','regular','400'),
														(484,'google','K2D','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic'),
														(485,'google','Hanuman','regular,700','400,700'),
														(486,'google','Libre Caslon Text','regular,italic,700','400,400-italic,700'),
														(487,'google','Marmelad','regular','400'),
														(488,'google','Duru Sans','regular','400'),
														(489,'google','Love Ya Like A Sister','regular','400'),
														(490,'google','Bentham','regular','400'),
														(491,'google','Slabo 13px','regular','400'),
														(492,'google','Calligraffitti','regular','400'),
														(493,'google','Cormorant Infant','300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(494,'google','Kumbh Sans','300,regular,700','300,400,700'),
														(495,'google','Sniglet','regular,800','400,800'),
														(496,'google','Aladin','regular','400'),
														(497,'google','IM Fell Double Pica','regular,italic','400,400-italic'),
														(498,'google','ZCOOL XiaoWei','regular','400'),
														(499,'google','Skranji','regular,700','400,700'),
														(500,'google','Averia Libre','300,300italic,regular,italic,700,700italic','300,300-italic,400,400-italic,700,700-italic'),
														(501,'google','Gugi','regular','400'),
														(502,'google','Cambay','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(503,'google','Poly','regular,italic','400,400-italic'),
														(504,'google','Manjari','100,regular,700','100,400,700'),
														(505,'google','Blinker','100,200,300,regular,600,700,800,900','100,200,300,400,600,700,800,900'),
														(506,'google','Homenaje','regular','400'),
														(507,'google','Buenard','regular,700','400,700'),
														(508,'google','Spectral SC','200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic','200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic'),
														(509,'google','Grandstander','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(510,'google','Oxygen Mono','regular','400'),
														(511,'google','Baskervville','regular,italic','400,400-italic'),
														(512,'google','NTR','regular','400'),
														(513,'google','Metrophobic','regular','400'),
														(514,'google','Esteban','regular','400'),
														(515,'google','Thasadith','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(516,'google','Commissioner','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(517,'google','Megrim','regular','400'),
														(518,'google','Harmattan','regular,700','400,700'),
														(519,'google','Balthazar','regular','400'),
														(520,'google','Amethysta','regular','400'),
														(521,'google','Kelly Slab','regular','400'),
														(522,'google','Andada','regular','400'),
														(523,'google','Monsieur La Doulaise','regular','400'),
														(524,'google','Rammetto One','regular','400'),
														(525,'google','Baloo Da 2','regular,500,600,700,800','400,500,600,700,800'),
														(526,'google','Alike','regular','400'),
														(527,'google','Hepta Slab','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(528,'google','Montez','regular','400'),
														(529,'google','Turret Road','200,300,regular,500,700,800','200,300,400,500,700,800'),
														(530,'google','Lekton','regular,italic,700','400,400-italic,700'),
														(531,'google','Chelsea Market','regular','400'),
														(532,'google','Waiting for the Sunrise','regular','400'),
														(533,'google','Fira Code','300,regular,500,600,700','300,400,500,600,700'),
														(534,'google','Bellefair','regular','400'),
														(535,'google','Gravitas One','regular','400'),
														(536,'google','Cutive','regular','400'),
														(537,'google','Frijole','regular','400'),
														(538,'google','Space Grotesk','300,regular,500,600,700','300,400,500,600,700'),
														(539,'google','Emilys Candy','regular','400'),
														(540,'google','Sue Ellen Francisco','regular','400'),
														(541,'google','Bungee Shade','regular','400'),
														(542,'google','Limelight','regular','400'),
														(543,'google','Newsreader','200,300,regular,500,600,700,800,200italic,300italic,italic,500italic,600italic,700italic,800italic','200,300,400,500,600,700,800,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic'),
														(544,'google','Convergence','regular','400'),
														(545,'google','Gabriela','regular','400'),
														(546,'google','IM Fell English','regular,italic','400,400-italic'),
														(547,'google','IM Fell DW Pica','regular,italic','400,400-italic'),
														(548,'google','Bowlby One','regular','400'),
														(549,'google','Antic Didone','regular','400'),
														(550,'google','Encode Sans Semi Condensed','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(551,'google','UnifrakturMaguntia','regular','400'),
														(552,'google','Sofia','regular','400'),
														(553,'google','Mirza','regular,500,600,700','400,500,600,700'),
														(554,'google','Zeyada','regular','400'),
														(555,'google','Grenze Gotisch','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(556,'google','Doppio One','regular','400'),
														(557,'google','Cormorant SC','300,regular,500,600,700','300,400,500,600,700'),
														(558,'google','Montaga','regular','400'),
														(559,'google','Dawning of a New Day','regular','400'),
														(560,'google','Battambang','regular,700','400,700'),
														(561,'google','Qwigley','regular','400'),
														(562,'google','Baumans','regular','400'),
														(563,'google','Sedgwick Ave','regular','400'),
														(564,'google','B612 Mono','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(565,'google','Oregano','regular,italic','400,400-italic'),
														(566,'google','Stardos Stencil','regular,700','400,700'),
														(567,'google','Andika','regular','400'),
														(568,'google','Pompiere','regular','400'),
														(569,'google','Expletus Sans','regular,italic,500,500italic,600,600italic,700,700italic','400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(570,'google','Libre Barcode 39','regular','400'),
														(571,'google','Inder','regular','400'),
														(572,'google','Proza Libre','regular,italic,500,500italic,600,600italic,700,700italic,800,800italic','400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic'),
														(573,'google','Brawler','regular','400'),
														(574,'google','Rouge Script','regular','400'),
														(575,'google','Lemon','regular','400'),
														(576,'google','David Libre','regular,500,700','400,500,700'),
														(577,'google','Fanwood Text','regular,italic','400,400-italic'),
														(578,'google','Ceviche One','regular','400'),
														(579,'google','Sarpanch','regular,500,600,700,800,900','400,500,600,700,800,900'),
														(580,'google','Kadwa','regular,700','400,700'),
														(581,'google','Give You Glory','regular','400'),
														(582,'google','Kurale','regular','400'),
														(583,'google','Quando','regular','400'),
														(584,'google','Oleo Script Swash Caps','regular,700','400,700'),
														(585,'google','Finger Paint','regular','400'),
														(586,'google','Anaheim','regular','400'),
														(587,'google','Share Tech','regular','400'),
														(588,'google','Vast Shadow','regular','400'),
														(589,'google','Gurajada','regular','400'),
														(590,'google','Rasa','300,regular,500,600,700','300,400,500,600,700'),
														(591,'google','Freckle Face','regular','400'),
														(592,'google','Hi Melody','regular','400'),
														(593,'google','Wendy One','regular','400'),
														(594,'google','Raleway Dots','regular','400'),
														(595,'google','Numans','regular','400'),
														(596,'google','Alike Angular','regular','400'),
														(597,'google','Meddon','regular','400'),
														(598,'google','Galada','regular','400'),
														(599,'google','Almendra','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(600,'google','Patrick Hand SC','regular','400'),
														(601,'google','Aguafina Script','regular','400'),
														(602,'google','Original Surfer','regular','400'),
														(603,'google','Clicker Script','regular','400'),
														(604,'google','BioRhyme','200,300,regular,700,800','200,300,400,700,800'),
														(605,'google','Bodoni Moda','regular,500,600,700,800,900,italic,500italic,600italic,700italic,800italic,900italic','400,500,600,700,800,900,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(606,'google','Federo','regular','400'),
														(607,'google','Encode Sans Semi Expanded','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(608,'google','JetBrains Mono','100,200,300,regular,500,600,700,800,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic','100,200,300,400,500,600,700,800,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic'),
														(609,'google','DM Mono','300,300italic,regular,italic,500,500italic','300,300-italic,400,400-italic,500,500-italic'),
														(610,'google','Sail','regular','400'),
														(611,'google','Dokdo','regular','400'),
														(612,'google','Fondamento','regular,italic','400,400-italic'),
														(613,'google','Caladea','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(614,'google','Mansalva','regular','400'),
														(615,'google','Antonio','100,200,300,regular,500,600,700','100,200,300,400,500,600,700'),
														(616,'google','Over the Rainbow','regular','400'),
														(617,'google','Atma','300,regular,500,600,700','300,400,500,600,700'),
														(618,'google','Chau Philomene One','regular,italic','400,400-italic'),
														(619,'google','Happy Monkey','regular','400'),
														(620,'google','Orienta','regular','400'),
														(621,'google','Oxanium','200,300,regular,500,600,700,800','200,300,400,500,600,700,800'),
														(622,'google','Strait','regular','400'),
														(623,'google','Short Stack','regular','400'),
														(624,'google','Ranchers','regular','400'),
														(625,'google','Ma Shan Zheng','regular','400'),
														(626,'google','Inknut Antiqua','300,regular,500,600,700,800,900','300,400,500,600,700,800,900'),
														(627,'google','B612','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(628,'google','Faster One','regular','400'),
														(629,'google','Yusei Magic','regular','400'),
														(630,'google','Livvic','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,900,900italic'),
														(631,'google','Denk One','regular','400'),
														(632,'google','RocknRoll One','regular','400'),
														(633,'google','Tenali Ramakrishna','regular','400'),
														(634,'google','Euphoria Script','regular','400'),
														(635,'google','Vollkorn SC','regular,600,700,900','400,600,700,900'),
														(636,'google','Codystar','300,regular','300,400'),
														(637,'google','Nova Round','regular','400'),
														(638,'google','Mouse Memoirs','regular','400'),
														(639,'google','Vesper Libre','regular,500,700,900','400,500,700,900'),
														(640,'google','Delius Swash Caps','regular','400'),
														(641,'google','Ledger','regular','400'),
														(642,'google','Nova Mono','regular','400'),
														(643,'google','Baloo Thambi 2','regular,500,600,700,800','400,500,600,700,800'),
														(644,'google','Calistoga','regular','400'),
														(645,'google','McLaren','regular','400'),
														(646,'google','Katibeh','regular','400'),
														(647,'google','Rakkas','regular','400'),
														(648,'google','Unkempt','regular,700','400,700'),
														(649,'google','Cambo','regular','400'),
														(650,'google','Iceland','regular','400'),
														(651,'google','Crafty Girls','regular','400'),
														(652,'google','Averia Sans Libre','300,300italic,regular,italic,700,700italic','300,300-italic,400,400-italic,700,700-italic'),
														(653,'google','Shojumaru','regular','400'),
														(654,'google','Major Mono Display','regular','400'),
														(655,'google','Mukta Mahee','200,300,regular,500,600,700,800','200,300,400,500,600,700,800'),
														(656,'google','Reggae One','regular','400'),
														(657,'google','Dela Gothic One','regular','400'),
														(658,'google','Salsa','regular','400'),
														(659,'google','Walter Turncoat','regular','400'),
														(660,'google','Italiana','regular','400'),
														(661,'google','Mina','regular,700','400,700'),
														(662,'google','Ruslan Display','regular','400'),
														(663,'google','Yatra One','regular','400'),
														(664,'google','Girassol','regular','400'),
														(665,'google','ZCOOL QingKe HuangYou','regular','400'),
														(666,'google','Aref Ruqaa','regular,700','400,700'),
														(667,'google','Montserrat Subrayada','regular,700','400,700'),
														(668,'google','Mako','regular','400'),
														(669,'google','Imprima','regular','400'),
														(670,'google','Poller One','regular','400'),
														(671,'google','Meera Inimai','regular','400'),
														(672,'google','Loved by the King','regular','400'),
														(673,'google','Prosto One','regular','400'),
														(674,'google','Cormorant Upright','300,regular,500,600,700','300,400,500,600,700'),
														(675,'google','Timmana','regular','400'),
														(676,'google','Flamenco','300,regular','300,400'),
														(677,'google','Geo','regular,italic','400,400-italic'),
														(678,'google','Nova Square','regular','400'),
														(679,'google','Cantora One','regular','400'),
														(680,'google','Tillana','regular,500,600,700,800','400,500,600,700,800'),
														(681,'google','Tienne','regular,700,900','400,700,900'),
														(682,'google','Cherry Cream Soda','regular','400'),
														(683,'google','Life Savers','regular,700,800','400,700,800'),
														(684,'google','Big Shoulders Text','100,300,regular,500,600,700,800,900','100,300,400,500,600,700,800,900'),
														(685,'google','Lexend','100,300,regular,500,600,700,800','100,300,400,500,600,700,800'),
														(686,'google','Arya','regular,700','400,700'),
														(687,'google','Della Respira','regular','400'),
														(688,'google','Vampiro One','regular','400'),
														(689,'google','Bilbo Swash Caps','regular','400'),
														(690,'google','Bellota Text','300,300italic,regular,italic,700,700italic','300,300-italic,400,400-italic,700,700-italic'),
														(691,'google','Nokora','regular,700','400,700'),
														(692,'google','Dynalight','regular','400'),
														(693,'google','Lily Script One','regular','400'),
														(694,'google','Encode Sans Expanded','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(695,'google','Trade Winds','regular','400'),
														(696,'google','Carrois Gothic SC','regular','400'),
														(697,'google','The Girl Next Door','regular','400'),
														(698,'google','Wire One','regular','400'),
														(699,'google','Lovers Quarrel','regular','400'),
														(700,'google','Elsie','regular,900','400,900'),
														(701,'google','Englebert','regular','400'),
														(702,'google','Gaegu','300,regular,700','300,400,700'),
														(703,'google','Scope One','regular','400'),
														(704,'google','Asul','regular,700','400,700'),
														(705,'google','Gafata','regular','400'),
														(706,'google','Peralta','regular','400'),
														(707,'google','Fontdiner Swanky','regular','400'),
														(708,'google','Metamorphous','regular','400'),
														(709,'google','Cherry Swash','regular,700','400,700'),
														(710,'google','Notable','regular','400'),
														(711,'google','Fresca','regular','400'),
														(712,'google','Voces','regular','400'),
														(713,'google','Coiny','regular','400'),
														(714,'google','Artifika','regular','400'),
														(715,'google','Red Rose','300,regular,500,600,700','300,400,500,600,700'),
														(716,'google','Bilbo','regular','400'),
														(717,'google','Tauri','regular','400'),
														(718,'google','Headland One','regular','400'),
														(719,'google','Baloo Chettan 2','regular,500,600,700,800','400,500,600,700,800'),
														(720,'google','Medula One','regular','400'),
														(721,'google','IM Fell English SC','regular','400'),
														(722,'google','Lexend Zetta','regular','400'),
														(723,'google','Kranky','regular','400'),
														(724,'google','Yeon Sung','regular','400'),
														(725,'google','Viaoda Libre','regular','400'),
														(726,'google','Port Lligat Slab','regular','400'),
														(727,'google','Just Me Again Down Here','regular','400'),
														(728,'google','Shippori Mincho','regular,500,600,700,800','400,500,600,700,800'),
														(729,'google','UnifrakturCook','700','700'),
														(730,'google','Goldman','regular,700','400,700'),
														(731,'google','Charmonman','regular,700','400,700'),
														(732,'google','Stalemate','regular','400'),
														(733,'google','Puritan','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(734,'google','Vibur','regular','400'),
														(735,'google','Fjord One','regular','400'),
														(736,'google','Delius Unicase','regular,700','400,700'),
														(737,'google','Pavanam','regular','400'),
														(738,'google','Amarante','regular','400'),
														(739,'google','Sura','regular,700','400,700'),
														(740,'google','Germania One','regular','400'),
														(741,'google','Quintessential','regular','400'),
														(742,'google','Text Me One','regular','400'),
														(743,'google','Habibi','regular','400'),
														(744,'google','Port Lligat Sans','regular','400'),
														(745,'google','New Rocker','regular','400'),
														(746,'google','Engagement','regular','400'),
														(747,'google','Gamja Flower','regular','400'),
														(748,'google','Slackey','regular','400'),
														(749,'google','Goblin One','regular','400'),
														(750,'google','Henny Penny','regular','400'),
														(751,'google','Eater','regular','400'),
														(752,'google','Spicy Rice','regular','400'),
														(753,'google','Ramaraja','regular','400'),
														(754,'google','Kite One','regular','400'),
														(755,'google','Sarina','regular','400'),
														(756,'google','Kumar One','regular','400'),
														(757,'google','Dekko','regular','400'),
														(758,'google','Paprika','regular','400'),
														(759,'google','Macondo Swash Caps','regular','400'),
														(760,'google','Crushed','regular','400'),
														(761,'google','Manuale','regular,500,600,700,italic,500italic,600italic,700italic','400,500,600,700,400-italic,500-italic,600-italic,700-italic'),
														(762,'google','Saira Stencil One','regular','400'),
														(763,'google','League Script','regular','400'),
														(764,'google','Shanti','regular','400'),
														(765,'google','Libre Barcode 39 Text','regular','400'),
														(766,'google','Ribeye','regular','400'),
														(767,'google','Song Myung','regular','400'),
														(768,'google','East Sea Dokdo','regular','400'),
														(769,'google','Kodchasan','200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(770,'google','Kulim Park','200,200italic,300,300italic,regular,italic,600,600italic,700,700italic','200,200-italic,300,300-italic,400,400-italic,600,600-italic,700,700-italic'),
														(771,'google','Baloo Bhai 2','regular,500,600,700,800','400,500,600,700,800'),
														(772,'google','Prociono','regular','400'),
														(773,'google','Zilla Slab Highlight','regular,700','400,700'),
														(774,'google','Pirata One','regular','400'),
														(775,'google','Fahkwang','200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic','200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic'),
														(776,'google','Nova Flat','regular','400'),
														(777,'google','Milonga','regular','400'),
														(778,'google','Julee','regular','400'),
														(779,'google','Koulen','regular','400'),
														(780,'google','Jomhuria','regular','400'),
														(781,'google','Chilanka','regular','400'),
														(782,'google','Chela One','regular','400'),
														(783,'google','IM Fell French Canon','regular,italic','400,400-italic'),
														(784,'google','Baloo Paaji 2','regular,500,600,700,800','400,500,600,700,800'),
														(785,'google','Sancreek','regular','400'),
														(786,'google','Moul','regular','400'),
														(787,'google','Inria Serif','300,300italic,regular,italic,700,700italic','300,300-italic,400,400-italic,700,700-italic'),
														(788,'google','Fraunces','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(789,'google','Chicle','regular','400'),
														(790,'google','Sonsie One','regular','400'),
														(791,'google','Rationale','regular','400'),
														(792,'google','Simonetta','regular,italic,900,900italic','400,400-italic,900,900italic'),
														(793,'google','Cute Font','regular','400'),
														(794,'google','Rosarivo','regular,italic','400,400-italic'),
														(795,'google','Mystery Quest','regular','400'),
														(796,'google','Donegal One','regular','400'),
														(797,'google','Mogra','regular','400'),
														(798,'google','Khmer','regular','400'),
														(799,'google','Modak','regular','400'),
														(800,'google','Londrina Outline','regular','400'),
														(801,'google','Syne','regular,500,600,700,800','400,500,600,700,800'),
														(802,'google','Uncial Antiqua','regular','400'),
														(803,'google','Kotta One','regular','400'),
														(804,'google','Wellfleet','regular','400'),
														(805,'google','Overlock SC','regular','400'),
														(806,'google','Stoke','300,regular','300,400'),
														(807,'google','Gayathri','100,regular,700','100,400,700'),
														(808,'google','IM Fell French Canon SC','regular','400'),
														(809,'google','Ruluko','regular','400'),
														(810,'google','Baloo Bhaina 2','regular,500,600,700,800','400,500,600,700,800'),
														(811,'google','Dangrek','regular','400'),
														(812,'google','Chathura','100,300,regular,700,800','100,300,400,700,800'),
														(813,'google','Stylish','regular','400'),
														(814,'google','Cagliostro','regular','400'),
														(815,'google','Tulpen One','regular','400'),
														(816,'google','Bubbler One','regular','400'),
														(817,'google','Offside','regular','400'),
														(818,'google','Fenix','regular','400'),
														(819,'google','Libre Barcode 39 Extended Text','regular','400'),
														(820,'google','Lakki Reddy','regular','400'),
														(821,'google','Bellota','300,300italic,regular,italic,700,700italic','300,300-italic,400,400-italic,700,700-italic'),
														(822,'google','Angkor','regular','400'),
														(823,'google','Kiwi Maru','300,regular,500','300,400,500'),
														(824,'google','IM Fell DW Pica SC','regular','400'),
														(825,'google','Chango','regular','400'),
														(826,'google','Ranga','regular,700','400,700'),
														(827,'google','IM Fell Great Primer','regular,italic','400,400-italic'),
														(828,'google','Petrona','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(829,'google','Sumana','regular,700','400,700'),
														(830,'google','Ibarra Real Nova','regular,500,600,700,italic,500italic,600italic,700italic','400,500,600,700,400-italic,500-italic,600-italic,700-italic'),
														(831,'google','Cormorant Unicase','300,regular,500,600,700','300,400,500,600,700'),
														(832,'google','Averia Gruesa Libre','regular','400'),
														(833,'google','Swanky and Moo Moo','regular','400'),
														(834,'google','Stint Ultra Expanded','regular','400'),
														(835,'google','Farsan','regular','400'),
														(836,'google','Condiment','regular','400'),
														(837,'google','Libre Caslon Display','regular','400'),
														(838,'google','Tomorrow','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(839,'google','Solway','300,regular,500,700,800','300,400,500,700,800'),
														(840,'google','Piazzolla','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(841,'google','Metal','regular','400'),
														(842,'google','Kdam Thmor','regular','400'),
														(843,'google','Gotu','regular','400'),
														(844,'google','Autour One','regular','400'),
														(845,'google','Margarine','regular','400'),
														(846,'google','Asar','regular','400'),
														(847,'google','Sulphur Point','300,regular,700','300,400,700'),
														(848,'google','Redressed','regular','400'),
														(849,'google','Junge','regular','400'),
														(850,'google','Dorsa','regular','400'),
														(851,'google','Hanalei Fill','regular','400'),
														(852,'google','Akronim','regular','400'),
														(853,'google','Gorditas','regular,700','400,700'),
														(854,'google','Elsie Swash Caps','regular,900','400,900'),
														(855,'google','Barrio','regular','400'),
														(856,'google','Castoro','regular,italic','400,400-italic'),
														(857,'google','Potta One','regular','400'),
														(858,'google','Rum Raisin','regular','400'),
														(859,'google','Jomolhari','regular','400'),
														(860,'google','Rowdies','300,regular,700','300,400,700'),
														(861,'google','Libre Barcode 128','regular','400'),
														(862,'google','Lexend Exa','regular','400'),
														(863,'google','Buda','300','300'),
														(864,'google','Croissant One','regular','400'),
														(865,'google','Modern Antiqua','regular','400'),
														(866,'google','Sree Krushnadevaraya','regular','400'),
														(867,'google','Kantumruy','300,regular,700','300,400,700'),
														(868,'google','Bayon','regular','400'),
														(869,'google','Linden Hill','regular,italic','400,400-italic'),
														(870,'google','Nosifer','regular','400'),
														(871,'google','Eagle Lake','regular','400'),
														(872,'google','Kavoon','regular','400'),
														(873,'google','Joti One','regular','400'),
														(874,'google','Content','regular,700','400,700'),
														(875,'google','Sansita Swashed','300,regular,500,600,700,800,900','300,400,500,600,700,800,900'),
														(876,'google','Ruthie','regular','400'),
														(877,'google','Peddana','regular','400'),
														(878,'google','Miniver','regular','400'),
														(879,'google','Inika','regular,700','400,700'),
														(880,'google','Marko One','regular','400'),
														(881,'google','Kufam','regular,500,600,700,800,900,italic,500italic,600italic,700italic,800italic,900italic','400,500,600,700,800,900,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(882,'google','Meie Script','regular','400'),
														(883,'google','Sirin Stencil','regular','400'),
														(884,'google','Molle','italic','400-italic'),
														(885,'google','Hachi Maru Pop','regular','400'),
														(886,'google','Trykker','regular','400'),
														(887,'google','Spirax','regular','400'),
														(888,'google','Piedra','regular','400'),
														(889,'google','Maiden Orange','regular','400'),
														(890,'google','Bigelow Rules','regular','400'),
														(891,'google','Princess Sofia','regular','400'),
														(892,'google','Long Cang','regular','400'),
														(893,'google','Srisakdi','regular,700','400,700'),
														(894,'google','Londrina Shadow','regular','400'),
														(895,'google','Iceberg','regular','400'),
														(896,'google','Shippori Mincho B1','regular,500,600,700,800','400,500,600,700,800'),
														(897,'google','Jolly Lodger','regular','400'),
														(898,'google','Galdeano','regular','400'),
														(899,'google','Caesar Dressing','regular','400'),
														(900,'google','Felipa','regular','400'),
														(901,'google','MuseoModerno','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(902,'google','Zen Dots','regular','400'),
														(903,'google','Bigshot One','regular','400'),
														(904,'google','DotGothic16','regular','400'),
														(905,'google','Atomic Age','regular','400'),
														(906,'google','Ribeye Marrow','regular','400'),
														(907,'google','Rhodium Libre','regular','400'),
														(908,'google','Kirang Haerang','regular','400'),
														(909,'google','Monofett','regular','400'),
														(910,'google','Sahitya','regular,700','400,700'),
														(911,'google','Devonshire','regular','400'),
														(912,'google','Smythe','regular','400'),
														(913,'google','Train One','regular','400'),
														(914,'google','Arbutus','regular','400'),
														(915,'google','Odor Mean Chey','regular','400'),
														(916,'google','Mrs Sheppards','regular','400'),
														(917,'google','Syne Mono','regular','400'),
														(918,'google','Metal Mania','regular','400'),
														(919,'google','Griffy','regular','400'),
														(920,'google','Kavivanar','regular','400'),
														(921,'google','Londrina Sketch','regular','400'),
														(922,'google','Beth Ellen','regular','400'),
														(923,'google','Romanesco','regular','400'),
														(924,'google','Asset','regular','400'),
														(925,'google','Glass Antiqua','regular','400'),
														(926,'google','Ravi Prakash','regular','400'),
														(927,'google','Nova Slim','regular','400'),
														(928,'google','Lancelot','regular','400'),
														(929,'google','Diplomata SC','regular','400'),
														(930,'google','Diplomata','regular','400'),
														(931,'google','Siemreap','regular','400'),
														(932,'google','Flavors','regular','400'),
														(933,'google','Ewert','regular','400'),
														(934,'google','Stick','regular','400'),
														(935,'google','MedievalSharp','regular','400'),
														(936,'google','Lexend Mega','regular','400'),
														(937,'google','Poor Story','regular','400'),
														(938,'google','Almendra SC','regular','400'),
														(939,'google','Snippet','regular','400'),
														(940,'google','Revalia','regular','400'),
														(941,'google','Odibee Sans','regular','400'),
														(942,'google','Andika New Basic','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(943,'google','Bahiana','regular','400'),
														(944,'google','Jacques Francois Shadow','regular','400'),
														(945,'google','Dr Sugiyama','regular','400'),
														(946,'google','Texturina','100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic','100,200,300,400,500,600,700,800,900,100-italic,200-italic,300-italic,400-italic,500-italic,600-italic,700-italic,800-italic,900italic'),
														(947,'google','Big Shoulders Stencil Display','100,300,regular,500,600,700,800,900','100,300,400,500,600,700,800,900'),
														(948,'google','Galindo','regular','400'),
														(949,'google','Keania One','regular','400'),
														(950,'google','Jim Nightshade','regular','400'),
														(951,'google','GFS Neohellenic','regular,italic,700,700italic','400,400-italic,700,700-italic'),
														(952,'google','Irish Grover','regular','400'),
														(953,'google','Gupter','regular,500,700','400,500,700'),
														(954,'google','ZCOOL KuaiLe','regular','400'),
														(955,'google','Risque','regular','400'),
														(956,'google','Libre Barcode 128 Text','regular','400'),
														(957,'google','Big Shoulders Stencil Text','100,300,regular,500,600,700,800,900','100,300,400,500,600,700,800,900'),
														(958,'google','Freehand','regular','400'),
														(959,'google','Plaster','regular','400'),
														(960,'google','Libre Barcode 39 Extended','regular','400'),
														(961,'google','Underdog','regular','400'),
														(962,'google','Oldenburg','regular','400'),
														(963,'google','Fascinate Inline','regular','400'),
														(964,'google','Orelega One','regular','400'),
														(965,'google','Barriecito','regular','400'),
														(966,'google','IM Fell Great Primer SC','regular','400'),
														(967,'google','Jacques Francois','regular','400'),
														(968,'google','Sedgwick Ave Display','regular','400'),
														(969,'google','Snowburst One','regular','400'),
														(970,'google','Kumar One Outline','regular','400'),
														(971,'google','Bokor','regular','400'),
														(972,'google','Varta','300,regular,500,600,700','300,400,500,600,700'),
														(973,'google','Mr Bedfort','regular','400'),
														(974,'google','Benne','regular','400'),
														(975,'google','Grenze','100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic','100,100-italic,200,200-italic,300,300-italic,400,400-italic,500,500-italic,600,600-italic,700,700-italic,800,800-italic,900,900italic'),
														(976,'google','Emblema One','regular','400'),
														(977,'google','Taprom','regular','400'),
														(978,'google','Brygada 1918','regular,500,600,700,italic,500italic,600italic,700italic','400,500,600,700,400-italic,500-italic,600-italic,700-italic'),
														(979,'google','Seymour One','regular','400'),
														(980,'google','Unlock','regular','400'),
														(981,'google','Lexend Giga','regular','400'),
														(982,'google','Macondo','regular','400'),
														(983,'google','Almendra Display','regular','400'),
														(984,'google','Butterfly Kids','regular','400'),
														(985,'google','Purple Purse','regular','400'),
														(986,'google','Miss Fajardose','regular','400'),
														(987,'google','New Tegomin','regular','400'),
														(988,'google','Smokum','regular','400'),
														(989,'google','Black And White Picture','regular','400'),
														(990,'google','IM Fell Double Pica SC','regular','400'),
														(991,'google','Stalinist One','regular','400'),
														(992,'google','Trochut','regular,italic,700','400,400-italic,700'),
														(993,'google','Erica One','regular','400'),
														(994,'google','Inria Sans','300,300italic,regular,italic,700,700italic','300,300-italic,400,400-italic,700,700-italic'),
														(995,'google','Nova Cut','regular','400'),
														(996,'google','Sunshiney','regular','400'),
														(997,'google','Liu Jian Mao Cao','regular','400'),
														(998,'google','Suwannaphum','regular','400'),
														(999,'google','Combo','regular','400'),
														(1000,'google','Preahvihear','regular','400'),
														(1001,'google','Chenla','regular','400'),
														(1002,'google','Zhi Mang Xing','regular','400'),
														(1003,'google','Bungee Hairline','regular','400'),
														(1004,'google','Supermercado One','regular','400'),
														(1005,'google','Sofadi One','regular','400'),
														(1006,'google','Bungee Outline','regular','400'),
														(1007,'google','Akaya Kanadaka','regular','400'),
														(1008,'google','Fascinate','regular','400'),
														(1009,'google','Bahianita','regular','400'),
														(1010,'google','Nova Script','regular','400'),
														(1011,'google','Federant','regular','400'),
														(1012,'google','Astloch','regular,700','400,700'),
														(1013,'google','Bonbon','regular','400'),
														(1014,'google','Passero One','regular','400'),
														(1015,'google','Akaya Telivigala','regular','400'),
														(1016,'google','Nova Oval','regular','400'),
														(1017,'google','Vibes','regular','400'),
														(1018,'google','Moulpali','regular','400'),
														(1019,'google','Gidugu','regular','400'),
														(1020,'google','Ruge Boogie','regular','400'),
														(1021,'google','Lacquer','regular','400'),
														(1022,'google','Miltonian','regular','400'),
														(1023,'google','Sevillana','regular','400'),
														(1024,'google','Miltonian Tattoo','regular','400'),
														(1025,'google','Aubrey','regular','400'),
														(1026,'google','Fasthand','regular','400'),
														(1027,'google','Butcherman','regular','400'),
														(1028,'google','Suravaram','regular','400'),
														(1029,'google','Nerko One','regular','400'),
														(1030,'google','Geostar Fill','regular','400'),
														(1031,'google','Hanalei','regular','400'),
														(1032,'google','BioRhyme Expanded','200,300,regular,700,800','200,300,400,700,800'),
														(1033,'google','Lexend Tera','regular','400'),
														(1034,'google','Fruktur','regular','400'),
														(1035,'google','Kenia','regular','400'),
														(1036,'google','Dhurjati','regular','400'),
														(1037,'google','Imbue','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(1038,'google','Big Shoulders Inline Text','100,300,regular,500,600,700,800,900','100,300,400,500,600,700,800,900'),
														(1039,'google','Langar','regular','400'),
														(1040,'google','Big Shoulders Inline Display','100,300,regular,500,600,700,800,900','100,300,400,500,600,700,800,900'),
														(1041,'google','Single Day','regular','400'),
														(1042,'google','Ballet','regular','400'),
														(1043,'google','Karantina','300,regular,700','300,400,700'),
														(1044,'google','Warnes','regular','400'),
														(1045,'google','Lexend Peta','regular','400'),
														(1046,'google','Xanh Mono','regular,italic','400,400-italic'),
														(1047,'google','Geostar','regular','400'),
														(1048,'google','Truculenta','100,200,300,regular,500,600,700,800,900','100,200,300,400,500,600,700,800,900'),
														(1049,'google','Trispace','100,200,300,regular,500,600,700,800','100,200,300,400,500,600,700,800'),
														(1050,'google','Oi','regular','400'),
														(1051,'google','Syne Tactile','regular','400'),
														(1052,'google','Libre Barcode EAN13 Text','regular','400');";
		
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_settings_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."settings` (
												  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
												  `smtp_enable` tinyint(1) NOT NULL DEFAULT '0',
												  `smtp_host` varchar(255) NOT NULL DEFAULT 'localhost',
												  `smtp_port` int(11) NOT NULL DEFAULT '25',
												  `smtp_auth` tinyint(1) NOT NULL DEFAULT '0',
												  `smtp_username` varchar(255) DEFAULT NULL,
												  `smtp_password` varchar(255) DEFAULT NULL,
												  `smtp_secure` tinyint(1) NOT NULL DEFAULT '0',
												  `upload_dir` varchar(255) NOT NULL DEFAULT './data',
												  `data_dir` varchar(255) NOT NULL DEFAULT './data',
												  `default_from_name` varchar(255) NOT NULL DEFAULT 'MachForm',
												  `default_from_email` varchar(255) DEFAULT NULL,
												  `default_form_theme_id` int(11) NOT NULL DEFAULT '0',
												  `base_url` varchar(255) DEFAULT NULL,
												  `form_manager_max_rows` int(11) DEFAULT '10',
												  `admin_image_url` varchar(255) DEFAULT NULL,
												  `disable_machform_link` int(1) DEFAULT '0',
												  `disable_pdf_link` int(1) DEFAULT '0',
												  `customer_id` varchar(100) DEFAULT NULL,
												  `customer_name` varchar(100) DEFAULT NULL,
												  `license_key` varchar(50) DEFAULT NULL,
												  `machform_version` varchar(10) NOT NULL DEFAULT '3.0',
												  `admin_theme` varchar(11) DEFAULT NULL,
												  `enforce_tsv` int(1) NOT NULL DEFAULT '0',
												  `enable_ip_restriction` int(1) NOT NULL DEFAULT '0',
												  `ip_whitelist` text,
												  `enable_account_locking` int(1) NOT NULL DEFAULT '0',
												  `account_lock_period` int(11) NOT NULL DEFAULT '30',
												  `account_lock_max_attempts` int(11) NOT NULL DEFAULT '6',
												  `recaptcha_site_key` varchar(255) DEFAULT NULL,
												  `recaptcha_secret_key` varchar(255) DEFAULT NULL,
												  `googleapi_clientid` varchar(255) DEFAULT NULL,
  												  `googleapi_clientsecret` varchar(255) DEFAULT NULL,
												  `ldap_enable` tinyint(1) NOT NULL DEFAULT '0',
												  `ldap_type` varchar(11) NOT NULL DEFAULT 'ad' COMMENT 'ad,openldap',
												  `ldap_host` varchar(255) DEFAULT NULL,
												  `ldap_port` int(11) NOT NULL DEFAULT '389',
												  `ldap_encryption` varchar(11) NOT NULL DEFAULT 'none' COMMENT 'none,ssl,tls',
												  `ldap_basedn` varchar(255) DEFAULT NULL,
												  `ldap_account_suffix` varchar(100) DEFAULT NULL,
												  `ldap_required_group` varchar(255) DEFAULT NULL,
												  `ldap_exclusive` tinyint(1) NOT NULL DEFAULT '0',
												  `timezone` varchar(100) DEFAULT NULL,
												  `enable_data_retention` tinyint(1) NOT NULL DEFAULT '0',
  												  `data_retention_period` int(11) NOT NULL DEFAULT '38' COMMENT 'months',
  												  `captcha_public_key` text,
												  `captcha_private_key` text,
												  PRIMARY KEY (`id`)
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function populate_ap_settings_table($dbh,$options){
		$default_from_email 	= $options['default_from_email'];
		$machform_base_url  	= $options['machform_base_url'];
		$new_machform_version 	= $options['new_machform_version'];
		$license_key 			= $options['license_key'];
		$upload_dir 			= $options['upload_dir']; 

		$query = "INSERT INTO `".MF_TABLE_PREFIX."settings` (`id`, 
																`smtp_enable`, 
																`smtp_host`, 
																`smtp_port`, 
																`smtp_auth`, 
																`smtp_username`, 
																`smtp_password`, 
																`smtp_secure`, 
																`upload_dir`, 
																`data_dir`, 
																`default_from_name`, 
																`default_from_email`, 
																`base_url`, 
																`form_manager_max_rows`, 
																`admin_image_url`, 
																`disable_machform_link`,
																`license_key`,
																`machform_version`)
														VALUES
																(1,
																 0,
																'localhost',
																25,
																0,
																'',
																'',
																0,
																'{$upload_dir}',
																'./data',
																'MachForm',
																'{$default_from_email}',
																'{$machform_base_url}',
																10,
																'',
																0,
																'{$license_key}',
																'{$new_machform_version}');";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_users_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."users` (
												   	  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
													  `user_email` varchar(255) NOT NULL DEFAULT '',
													  `user_password` varchar(255) NOT NULL DEFAULT '',
													  `user_fullname` varchar(255) NOT NULL DEFAULT '',
													  `user_admin_theme` varchar(11) DEFAULT NULL,
													  `reset_hash` varchar(100) DEFAULT NULL,
  													  `reset_date` datetime DEFAULT NULL,
													  `priv_administer` tinyint(1) NOT NULL DEFAULT '0',
													  `priv_new_forms` tinyint(1) NOT NULL DEFAULT '0',
													  `priv_new_themes` tinyint(1) NOT NULL DEFAULT '0',
													  `last_login_date` datetime DEFAULT NULL,
													  `last_ip_address` varchar(15) DEFAULT '',
													  `login_attempt_date` datetime DEFAULT NULL,
													  `login_attempt_count` int(11) NOT NULL DEFAULT '0',
													  `cookie_hash` varchar(255) DEFAULT '',
													  `tsv_enable` int(1) NOT NULL DEFAULT '0',
													  `tsv_secret` varchar(16) DEFAULT NULL,
													  `tsv_code_log` varchar(100) DEFAULT NULL,
													  `folders_pinned` tinyint(1) NOT NULL DEFAULT '0',
													  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 - deleted; 1 - active; 2 - suspended',
													  PRIMARY KEY (`user_id`)
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function populate_ap_users_table($dbh,$options){

		$admin_username 	   = $options['admin_username'];
		$default_password_hash = $options['default_password_hash'];

		$query = "INSERT INTO `".MF_TABLE_PREFIX."users` (`user_id`, 
																`user_email`, 
																`user_password`, 
																`user_fullname`, 
																`priv_administer`, 
																`priv_new_forms`, 
																`priv_new_themes`, 
																`status`)
														VALUES
																(1,
																'{$admin_username}',
																'{$default_password_hash}',
																'Administrator',
																1,
																1,
																1,
																1);";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function populate_ap_folders_table($dbh){

		$query = "INSERT INTO 
								`".MF_TABLE_PREFIX."folders`( 
											`user_id`, 
											`folder_id`, 
											`folder_position`, 
											`folder_name`, 
											`folder_selected`, 
											`rule_all_any`) 
						  VALUES (1, 1, 1, 'All Forms', 1, 'all');";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_permissions_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."permissions` (
												  `form_id` bigint(11) unsigned NOT NULL,
												  `user_id` int(11) unsigned NOT NULL,
												  `edit_form` tinyint(1) NOT NULL DEFAULT '0',
												  `edit_report` tinyint(1) NOT NULL DEFAULT '0',
												  `edit_entries` tinyint(1) NOT NULL DEFAULT '0',
												  `view_entries` tinyint(1) NOT NULL DEFAULT '0',
												  PRIMARY KEY (`form_id`,`user_id`)
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_entries_preferences_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."entries_preferences` (
												      `form_id` int(11) NOT NULL,
													  `user_id` int(11) NOT NULL,
													  `entries_sort_by` varchar(100) NOT NULL DEFAULT 'id-desc',
													  `entries_enable_filter` int(1) NOT NULL DEFAULT '0',
													  `entries_filter_type` varchar(5) NOT NULL DEFAULT 'all' COMMENT 'all or any',
													  `entries_incomplete_sort_by` varchar(100) NOT NULL DEFAULT 'id-desc',
													  `entries_incomplete_enable_filter` int(1) NOT NULL DEFAULT '0',
													  `entries_incomplete_filter_type` varchar(5) NOT NULL DEFAULT 'all' COMMENT 'all or any'
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}
	
	function create_ap_form_locks_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_locks` (
												  `form_id` int(11) NOT NULL,
												  `user_id` int(11) NOT NULL,
												  `lock_date` datetime NOT NULL
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_field_logic_elements_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."field_logic_elements` (
																		  `form_id` int(11) NOT NULL,
																		  `element_id` int(11) NOT NULL,
																		  `rule_show_hide` varchar(4) NOT NULL DEFAULT 'show',
																		  `rule_all_any` varchar(3) NOT NULL DEFAULT 'all',
																		  PRIMARY KEY (`form_id`,`element_id`)
																		) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_field_logic_conditions_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."field_logic_conditions` (
																		  `alc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																		  `form_id` int(11) NOT NULL,
																		  `target_element_id` int(11) NOT NULL,
																		  `element_name` varchar(50) NOT NULL DEFAULT '',
																		  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
																		  `rule_keyword` varchar(255) DEFAULT NULL,
																		  PRIMARY KEY (`alc_id`),
																		  KEY `form_id` (`form_id`,`target_element_id`)
																		) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_form_payments_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_payments` (
																  `afp_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																  `form_id` int(11) unsigned NOT NULL,
																  `record_id` int(11) unsigned NOT NULL,
																  `payment_id` varchar(255) DEFAULT NULL,
																  `date_created` datetime DEFAULT NULL,
																  `payment_date` datetime DEFAULT NULL,
																  `payment_status` varchar(255) DEFAULT NULL,
																  `payment_fullname` varchar(255) DEFAULT NULL,
																  `payment_amount` decimal(62,2) NOT NULL DEFAULT '0.00',
																  `payment_currency` varchar(3) NOT NULL DEFAULT 'usd',
																  `payment_test_mode` int(1) NOT NULL DEFAULT '0',
																  `payment_merchant_type` varchar(25) DEFAULT NULL,
																  `status` int(1) NOT NULL DEFAULT '1',
																  `billing_street` varchar(255) DEFAULT NULL,
																  `billing_city` varchar(255) DEFAULT NULL,
																  `billing_state` varchar(255) DEFAULT NULL,
																  `billing_zipcode` varchar(255) DEFAULT NULL,
																  `billing_country` varchar(255) DEFAULT NULL,
																  `same_shipping_address` int(1) NOT NULL DEFAULT '1',
																  `shipping_street` varchar(255) DEFAULT NULL,
																  `shipping_city` varchar(255) DEFAULT NULL,
																  `shipping_state` varchar(255) DEFAULT NULL,
																  `shipping_zipcode` varchar(255) DEFAULT NULL,
																  `shipping_country` varchar(255) DEFAULT NULL,
																   PRIMARY KEY (`afp_id`),
																   KEY `status` (`status`),
																   KEY `form_id` (`form_id`),
																   KEY `record_id` (`record_id`)
																  ) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_page_logic_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."page_logic` (
																`form_id` int(11) NOT NULL,
															  	`page_id` varchar(15) NOT NULL DEFAULT '',
															  	`rule_all_any` varchar(3) NOT NULL DEFAULT 'all',
															  	 PRIMARY KEY (`form_id`,`page_id`)
															   ) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_page_logic_conditions_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."page_logic_conditions` (
																		   `apc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																		   `form_id` int(11) NOT NULL,
																		   `target_page_id` varchar(15) NOT NULL DEFAULT '',
																		   `element_name` varchar(50) NOT NULL DEFAULT '',
																		   `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
																		   `rule_keyword` varchar(255) DEFAULT NULL,
																		    PRIMARY KEY (`apc_id`),
																		    KEY `form_id` (`form_id`,`target_page_id`)
															   			  ) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_form_sorts_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_sorts` (
												  `user_id` int(11) NOT NULL,
												  `sort_by` varchar(25) DEFAULT '',
												  PRIMARY KEY (`user_id`)
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_email_logic_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."email_logic` (
												    		      `form_id` int(11) NOT NULL,
																  `rule_id` int(11) NOT NULL,
																  `rule_all_any` varchar(3) NOT NULL DEFAULT 'all',
																  `target_email` text NOT NULL,
																  `template_name` varchar(15) NOT NULL DEFAULT 'notification' COMMENT 'notification - confirmation - custom',
																  `custom_from_name` text,
																  `custom_from_email` varchar(255) NOT NULL DEFAULT '',
																  `custom_replyto_email` varchar(255) NOT NULL DEFAULT '',
																  `custom_subject` text,
																  `custom_bcc` text,
																  `custom_content` text,
																  `custom_plain_text` int(1) NOT NULL DEFAULT '0',
																  `custom_pdf_enable` int(1) NOT NULL DEFAULT '0',
																  `custom_pdf_content` text,
																  `delay_notification_until_paid` int(1) NOT NULL DEFAULT '0',
																  PRIMARY KEY (`form_id`,`rule_id`)
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_email_logic_conditions_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."email_logic_conditions` (
												    		  `aec_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `target_rule_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `rule_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`aec_id`),
															  KEY `form_id` (`form_id`,`target_rule_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_webhook_options_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."webhook_options` (
												    		  `awo_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `rule_id` int(11) NOT NULL DEFAULT '0',
															  `rule_all_any` varchar(3) NOT NULL DEFAULT 'all',
															  `webhook_url` text,
															  `webhook_method` varchar(4) NOT NULL DEFAULT 'post',
															  `webhook_format` varchar(10) NOT NULL DEFAULT 'key-value',
															  `webhook_raw_data` mediumtext,
															  `enable_http_auth` int(1) DEFAULT '0',
															  `http_username` varchar(255) DEFAULT NULL,
															  `http_password` varchar(255) DEFAULT NULL,
															  `enable_custom_http_headers` int(1) NOT NULL DEFAULT '0',
															  `custom_http_headers` text,
															  `delay_notification_until_paid` int(1) NOT NULL DEFAULT '0',
															  PRIMARY KEY (`awo_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_webhook_parameters_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."webhook_parameters` (
												    		  `awp_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `rule_id` int(11) NOT NULL DEFAULT '0',
															  `param_name` text,
															  `param_value` text,
															  PRIMARY KEY (`awp_id`),
															  KEY `form_id` (`form_id`,`rule_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_webhook_logic_conditions_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."webhook_logic_conditions` (
												    		  `wlc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `target_rule_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `rule_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`wlc_id`),
															  KEY `form_id` (`form_id`,`target_rule_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_reports_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."reports` (
												    		  `form_id` int(11) NOT NULL,
															  `report_access_key` varchar(100) DEFAULT NULL,
															  PRIMARY KEY (`form_id`),
															  KEY `report_access_key` (`report_access_key`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_report_elements_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."report_elements` (
												    		  `access_key` varchar(100) DEFAULT NULL,
															  `form_id` int(11) NOT NULL,
															  `chart_id` int(11) NOT NULL,
															  `chart_position` int(11) NOT NULL DEFAULT '0',
															  `chart_status` int(1) NOT NULL DEFAULT '1',
															  `chart_datasource` varchar(25) NOT NULL DEFAULT '',
															  `chart_type` varchar(25) NOT NULL DEFAULT '',
															  `chart_enable_filter` int(1) NOT NULL DEFAULT '0',
															  `chart_filter_type` varchar(5) NOT NULL DEFAULT 'all',
															  `chart_title` text,
															  `chart_title_position` varchar(10) NOT NULL DEFAULT 'top',
															  `chart_title_align` varchar(10) NOT NULL DEFAULT 'center',
															  `chart_width` int(11) NOT NULL DEFAULT '0',
															  `chart_height` int(11) NOT NULL DEFAULT '400',
															  `chart_background` varchar(8) DEFAULT NULL,
															  `chart_theme` varchar(25) NOT NULL DEFAULT 'blueopal',
															  `chart_legend_visible` int(1) NOT NULL DEFAULT '1',
															  `chart_legend_position` varchar(10) NOT NULL DEFAULT 'right',
															  `chart_labels_visible` int(1) NOT NULL DEFAULT '1',
															  `chart_labels_position` varchar(10) NOT NULL DEFAULT 'outsideEnd',
															  `chart_labels_template` varchar(255) NOT NULL DEFAULT '#= category #',
															  `chart_labels_align` varchar(10) NOT NULL DEFAULT 'circle',
															  `chart_tooltip_visible` int(1) NOT NULL DEFAULT '1',
															  `chart_tooltip_template` varchar(255) NOT NULL DEFAULT '#= category # - #= dataItem.entry # - #= kendo.format(''{0:P}'', percentage)#',
															  `chart_gridlines_visible` int(1) NOT NULL DEFAULT '1',
															  `chart_bar_color` varchar(8) DEFAULT NULL,
															  `chart_is_stacked` int(1) NOT NULL DEFAULT '0',
															  `chart_is_vertical` int(1) NOT NULL DEFAULT '0',
															  `chart_line_style` varchar(6) NOT NULL DEFAULT 'smooth',
															  `chart_axis_is_date` int(1) NOT NULL DEFAULT '0',
															  `chart_date_range` varchar(6) NOT NULL DEFAULT 'all' COMMENT 'all,period,custom',
															  `chart_date_period_value` int(11) NOT NULL DEFAULT '1',
															  `chart_date_period_unit` varchar(5) NOT NULL DEFAULT 'day',
															  `chart_date_axis_baseunit` varchar(5) DEFAULT NULL,
															  `chart_date_range_start` date DEFAULT NULL,
															  `chart_date_range_end` date DEFAULT NULL,
															  `chart_grid_page_size` int(11) NOT NULL DEFAULT '10',
															  `chart_grid_max_length` int(11) NOT NULL DEFAULT '100',
															  `chart_grid_sort_by` varchar(100) NOT NULL DEFAULT 'id-desc',
															  PRIMARY KEY (`form_id`,`chart_id`),
															  KEY `access_key` (`access_key`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_report_filters_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."report_filters` (
												    		  `arf_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `chart_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `filter_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `filter_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`arf_id`),
															  KEY `form_id` (`form_id`,`chart_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_grid_columns_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."grid_columns` (
												    		  `agc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `chart_id` int(11) NOT NULL,
															  `element_name` varchar(255) NOT NULL DEFAULT '',
															  `position` int(11) NOT NULL,
															  PRIMARY KEY (`agc_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_success_logic_conditions_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."success_logic_conditions` (
												    		  `slc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `target_rule_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `rule_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`slc_id`),
															  KEY `form_id` (`form_id`,`target_rule_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_success_logic_options_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."success_logic_options` (
												    		  `slo_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `rule_id` int(11) NOT NULL DEFAULT '0',
															  `rule_all_any` varchar(3) NOT NULL DEFAULT 'all',
															  `success_type` varchar(11) NOT NULL DEFAULT 'message' COMMENT 'message;redirect',
															  `success_message` text,
															  `redirect_url` text,
															  PRIMARY KEY (`slo_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_form_themes_files_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_themes_files` (
												    		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `file_name` text NOT NULL,
															  `file_content` longblob,
															  PRIMARY KEY (`id`),
															  KEY `file_name` (`file_name`(255))
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_approval_settings_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."approval_settings` (
												    		  `form_id` int(11) NOT NULL,
															  `workflow_type` varchar(11) NOT NULL DEFAULT 'parallel' COMMENT 'parallel,serial',
															  `parallel_workflow` varchar(11) NOT NULL DEFAULT 'any' COMMENT 'any,all',
															  `revision_no` int(11) NOT NULL,
															  `revision_date` datetime default NULL,
															  `last_revised_by` int(11) NOT NULL,
															  PRIMARY KEY (`form_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_approvers_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."approvers` (
												    		  `form_id` int(11) NOT NULL,
															  `user_id` int(11) NOT NULL,
															  `rule_all_any` varchar(3) NOT NULL DEFAULT 'all' COMMENT 'all,any',
															  `user_position` int(11) NOT NULL,
															  PRIMARY KEY (`form_id`,`user_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_approvers_conditions_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."approvers_conditions` (
												    		  `aac_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `target_user_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `rule_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`aac_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}


	function create_ap_form_images_files_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_images_files` (
													    		  `form_id` int(11) NOT NULL,
																  `file_name` text NOT NULL,
																  `file_content` longblob,
																  KEY `form_id` (`form_id`,`file_name`(100))
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_form_pdf_files_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_pdf_files` (
													    		  `form_id` int(11) NOT NULL,
																  `file_name` text NOT NULL,
																  `file_content` longblob,
																  KEY `form_id` (`form_id`,`file_name`(100))
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_integrations_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."integrations` (
													    		  `ai_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																  `form_id` int(11) NOT NULL,
																  `gsheet_integration_status` tinyint(1) NOT NULL DEFAULT '0',
																  `gsheet_spreadsheet_id` varchar(255) DEFAULT NULL,
																  `gsheet_spreadsheet_url` text,
																  `gsheet_elements` text,
																  `gsheet_create_new_sheet` tinyint(1) NOT NULL DEFAULT '0',
																  `gsheet_refresh_token` varchar(255) DEFAULT NULL,
																  `gsheet_access_token` varchar(255) DEFAULT NULL,
																  `gsheet_token_create_date` datetime DEFAULT NULL,
																  `gsheet_linked_user_id` int(11) DEFAULT NULL,
																  `gsheet_delay_notification_until_paid` tinyint(1) NOT NULL DEFAULT '1',
																  `gsheet_delay_notification_until_approved` tinyint(1) NOT NULL DEFAULT '1',
																  `gcal_integration_status` tinyint(1) NOT NULL DEFAULT '0',
																  `gcal_refresh_token` varchar(255) DEFAULT NULL,
																  `gcal_access_token` varchar(255) DEFAULT NULL,
																  `gcal_token_create_date` datetime DEFAULT NULL,
																  `gcal_linked_user_id` int(11) DEFAULT NULL,
																  `gcal_calendar_id` varchar(255) DEFAULT NULL,
																  `gcal_event_title` text,
																  `gcal_event_desc` text,
																  `gcal_event_location` text,
																  `gcal_event_allday` tinyint(1) NOT NULL DEFAULT '1',
																  `gcal_start_datetime` datetime DEFAULT NULL,
																  `gcal_start_date_element` int(11) DEFAULT NULL,
																  `gcal_start_time_element` int(11) DEFAULT NULL,
																  `gcal_start_date_type` varchar(11) NOT NULL DEFAULT 'datetime' COMMENT 'datetime,element',
																  `gcal_start_time_type` varchar(11) NOT NULL DEFAULT 'datetime' COMMENT 'datetime,element',
																  `gcal_end_datetime` datetime DEFAULT NULL,
																  `gcal_end_date_element` int(11) DEFAULT NULL,
																  `gcal_end_time_element` int(11) DEFAULT NULL,
																  `gcal_end_time_type` varchar(11) NOT NULL DEFAULT 'datetime' COMMENT 'datetime,element',
																  `gcal_end_date_type` varchar(11) NOT NULL DEFAULT 'datetime' COMMENT 'datetime,element',
																  `gcal_duration_type` varchar(11) NOT NULL DEFAULT 'period' COMMENT 'period,datetime',
																  `gcal_duration_period_length` int(11) NOT NULL DEFAULT '30',
																  `gcal_duration_period_unit` varchar(11) NOT NULL DEFAULT 'minute' COMMENT 'minute,hour,day',
																  `gcal_attendee_email` int(11) DEFAULT NULL,
																  `gcal_delay_notification_until_paid` tinyint(1) NOT NULL DEFAULT '1',
																  `gcal_delay_notification_until_approved` tinyint(1) NOT NULL DEFAULT '1',
																  PRIMARY KEY (`ai_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_folders_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."folders` (
													    	  `user_id` int(11) NOT NULL,
															  `folder_id` int(11) NOT NULL,
															  `folder_position` int(11) NOT NULL,
															  `folder_name` varchar(255) NOT NULL DEFAULT '',
															  `folder_selected` tinyint(1) NOT NULL DEFAULT '0',
															  `rule_all_any` varchar(3) NOT NULL DEFAULT 'all',
															  PRIMARY KEY (`user_id`,`folder_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_folders_conditions_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."folders_conditions` (
													    	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `user_id` int(11) NOT NULL,
															  `folder_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `rule_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_form_stats_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_stats` (
													    	  `form_id` int(11) unsigned NOT NULL,
															  `total_entries` int(11) unsigned DEFAULT NULL,
															  `today_entries` int(11) unsigned DEFAULT NULL,
															  `last_entry_date` datetime DEFAULT NULL,
															  PRIMARY KEY (`form_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	function create_ap_sessions_table($dbh){
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."sessions` (
													    	  	`id` varchar(255) NOT NULL,
  																`data` mediumtext NOT NULL,
  																`timestamp` int(255) NOT NULL,
  																PRIMARY KEY (`id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			return $e->getMessage().'<br/><br/>';
		}

		return '';
	}

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_2_x_to_3_0($dbh,$options=array()){

		$post_install_error = '';
		$license_key 		  = $options['license_key'];
		$new_machform_version = $options['new_machform_version'];
		$admin_username		  = $options['admin_username'];
		
		//2. Alter table ap_forms
		//add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms`
												  ADD COLUMN `form_tags` varchar(255) DEFAULT NULL,
												  ADD COLUMN `form_redirect_enable` int(1) NOT NULL DEFAULT '0',
												  ADD COLUMN `form_captcha_type` char(1) NOT NULL DEFAULT 'r',
												  ADD COLUMN `form_theme_id` int(11) NOT NULL DEFAULT '0',
												  ADD COLUMN `form_resume_enable` int(1) NOT NULL DEFAULT '0',
												  ADD COLUMN `form_limit_enable` int(1) NOT NULL DEFAULT '0',
												  ADD COLUMN `form_limit` int(11) NOT NULL DEFAULT '0',
												  ADD COLUMN `form_label_alignment` varchar(11) NOT NULL DEFAULT 'top_label',
												  ADD COLUMN `form_language` varchar(50) DEFAULT NULL,
												  ADD COLUMN `form_page_total` int(11) NOT NULL DEFAULT '1',
												  ADD COLUMN `form_lastpage_title` varchar(255) DEFAULT NULL,
												  ADD COLUMN `form_submit_primary_text` varchar(255) NOT NULL DEFAULT 'Submit',
												  ADD COLUMN `form_submit_secondary_text` varchar(255) NOT NULL DEFAULT 'Previous',
												  ADD COLUMN `form_submit_primary_img` varchar(255) DEFAULT NULL,
												  ADD COLUMN `form_submit_secondary_img` varchar(255) DEFAULT NULL,
												  ADD COLUMN `form_submit_use_image` int(1) NOT NULL DEFAULT '0',
												  ADD COLUMN `form_review_primary_text` varchar(255) NOT NULL DEFAULT 'Submit',
												  ADD COLUMN `form_review_secondary_text` varchar(255) NOT NULL DEFAULT 'Previous',
												  ADD COLUMN `form_review_primary_img` varchar(255) DEFAULT NULL,
												  ADD COLUMN `form_review_secondary_img` varchar(255) DEFAULT NULL,
												  ADD COLUMN `form_review_use_image` int(11) NOT NULL DEFAULT '0',
												  ADD COLUMN `form_review_title` text,
												  ADD COLUMN `form_review_description` text,
												  ADD COLUMN `form_pagination_type` varchar(11) NOT NULL DEFAULT 'steps',
												  ADD COLUMN `form_schedule_enable` int(1) NOT NULL DEFAULT '0',
												  ADD COLUMN `form_schedule_start_date` date DEFAULT NULL,
												  ADD COLUMN `form_schedule_end_date` date DEFAULT NULL,
												  ADD COLUMN `form_schedule_start_hour` time DEFAULT NULL,
												  ADD COLUMN `form_schedule_end_hour` time DEFAULT NULL,
												  ADD COLUMN `esl_enable` tinyint(1) NOT NULL DEFAULT '0',
												  ADD COLUMN `esr_enable` tinyint(1) NOT NULL DEFAULT '0',
												  ADD COLUMN `payment_enable_merchant` int(1) NOT NULL DEFAULT '-1',
												  ADD COLUMN `payment_merchant_type` varchar(25) NOT NULL DEFAULT 'paypal_standard',
												  ADD COLUMN `payment_paypal_email` varchar(255) DEFAULT NULL,
												  ADD COLUMN `payment_paypal_language` varchar(5) NOT NULL DEFAULT 'US',
												  ADD COLUMN `payment_currency` varchar(5) NOT NULL DEFAULT 'USD',
												  ADD COLUMN `payment_show_total` int(1) NOT NULL DEFAULT '0',
												  ADD COLUMN `payment_total_location` varchar(11) NOT NULL DEFAULT 'top',
												  ADD COLUMN `payment_enable_recurring` int(1) NOT NULL DEFAULT '0',
												  ADD COLUMN `payment_recurring_cycle` int(11) NOT NULL DEFAULT '1',
												  ADD COLUMN `payment_recurring_unit` varchar(5) NOT NULL DEFAULT 'month',
												  ADD COLUMN `payment_price_type` varchar(11) NOT NULL DEFAULT 'fixed',
												  ADD COLUMN `payment_price_amount` decimal(62,2) NOT NULL DEFAULT '0.00',
												  ADD COLUMN `payment_price_name` varchar(255) DEFAULT NULL,
												  ADD COLUMN `entries_sort_by` varchar(100) NOT NULL DEFAULT 'id-desc',
												  ADD COLUMN `entries_enable_filter` int(1) NOT NULL DEFAULT '0',
												  ADD COLUMN `entries_filter_type` varchar(5) NOT NULL DEFAULT 'all' COMMENT 'all or any';";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Alter table ap_form_elements
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` 
														  ADD COLUMN `element_css_class` varchar(255) NOT NULL DEFAULT '',
														  ADD COLUMN `element_range_min` bigint(11) unsigned NOT NULL DEFAULT '0',
														  ADD COLUMN `element_range_max` bigint(11) unsigned NOT NULL DEFAULT '0',
														  ADD COLUMN `element_range_limit_by` char(1) NOT NULL,
														  ADD COLUMN `element_status` int(1) NOT NULL DEFAULT '2',
														  ADD COLUMN `element_choice_columns` int(1) NOT NULL DEFAULT '1',
														  ADD COLUMN `element_choice_has_other` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_choice_other_label` text,
														  ADD COLUMN `element_time_showsecond` int(11) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_time_24hour` int(11) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_address_hideline2` int(11) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_address_us_only` int(11) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_date_enable_range` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_date_range_min` date DEFAULT NULL,
														  ADD COLUMN `element_date_range_max` date DEFAULT NULL,
														  ADD COLUMN `element_date_enable_selection_limit` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_date_selection_max` int(11) NOT NULL DEFAULT '1',
														  ADD COLUMN `element_date_past_future` char(1) NOT NULL DEFAULT 'p',
														  ADD COLUMN `element_date_disable_past_future` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_date_disable_weekend` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_date_disable_specific` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_date_disabled_list` text CHARACTER SET utf8 COLLATE utf8_bin,
														  ADD COLUMN `element_file_enable_type_limit` int(1) NOT NULL DEFAULT '1',
														  ADD COLUMN `element_file_block_or_allow` char(1) NOT NULL DEFAULT 'b',
														  ADD COLUMN `element_file_type_list` varchar(255) DEFAULT NULL,
														  ADD COLUMN `element_file_as_attachment` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_file_enable_advance` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_file_auto_upload` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_file_enable_multi_upload` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_file_max_selection` int(11) NOT NULL DEFAULT '5',
														  ADD COLUMN `element_file_enable_size_limit` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_file_size_max` int(11) DEFAULT NULL,
														  ADD COLUMN `element_matrix_allow_multiselect` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_matrix_parent_id` int(11) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_submit_use_image` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_submit_primary_text` varchar(255) NOT NULL DEFAULT 'Continue',
														  ADD COLUMN `element_submit_secondary_text` varchar(255) NOT NULL DEFAULT 'Previous',
														  ADD COLUMN `element_submit_primary_img` varchar(255) DEFAULT NULL,
														  ADD COLUMN `element_submit_secondary_img` varchar(255) DEFAULT NULL,
														  ADD COLUMN `element_page_title` varchar(255) DEFAULT NULL,
														  ADD COLUMN `element_page_number` int(11) NOT NULL DEFAULT '1';";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//change the field size of element_constraint
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` CHANGE COLUMN `element_constraint` `element_constraint` varchar(255) DEFAULT NULL;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//update the element_status value to 1
		$query = "UPDATE `".MF_TABLE_PREFIX."form_elements` SET `element_status`=1";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Create table ap_element_prices
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."element_prices` (
													  `aep_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
													  `form_id` int(11) NOT NULL,
													  `element_id` int(11) NOT NULL,
													  `option_id` int(11) NOT NULL DEFAULT '0',
													  `price` decimal(62,2) NOT NULL DEFAULT '0.00',
													  PRIMARY KEY (`aep_id`),
													  KEY `form_id` (`form_id`),
													  KEY `element_id` (`element_id`)
													) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Create table ap_fonts
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."fonts` (
												  `font_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
												  `font_origin` varchar(11) NOT NULL DEFAULT 'google',
												  `font_family` varchar(100) DEFAULT NULL,
												  `font_variants` text,
												  `font_variants_numeric` text,
												  PRIMARY KEY (`font_id`),
												  KEY `font_family` (`font_family`)
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		

		//6. Create table ap_form_filters
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_filters` (
														  `aff_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
														  `form_id` int(11) NOT NULL,
														  `element_name` varchar(50) NOT NULL DEFAULT '',
														  `filter_condition` varchar(15) NOT NULL DEFAULT 'is',
														  `filter_keyword` varchar(255) NOT NULL DEFAULT '',
														  PRIMARY KEY (`aff_id`),
														  KEY `form_id` (`form_id`)
														) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//7. Create table ap_form_themes
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_themes` (
													  `theme_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
													  `status` int(1) DEFAULT '1',
													  `theme_has_css` int(1) NOT NULL DEFAULT '0',
													  `theme_name` varchar(255) DEFAULT '',
													  `theme_built_in` int(1) NOT NULL DEFAULT '0',
													  `logo_type` varchar(11) NOT NULL DEFAULT 'default' COMMENT 'default,custom,disabled',
													  `logo_custom_image` text,
													  `logo_custom_height` int(11) NOT NULL DEFAULT '40',
													  `logo_default_image` varchar(50) DEFAULT '',
													  `logo_default_repeat` int(1) NOT NULL DEFAULT '0',
													  `wallpaper_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
													  `wallpaper_bg_color` varchar(11) DEFAULT '',
													  `wallpaper_bg_pattern` varchar(50) DEFAULT '',
													  `wallpaper_bg_custom` text,
													  `header_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
													  `header_bg_color` varchar(11) DEFAULT '',
													  `header_bg_pattern` varchar(50) DEFAULT '',
													  `header_bg_custom` text,
													  `form_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
													  `form_bg_color` varchar(11) DEFAULT '',
													  `form_bg_pattern` varchar(50) DEFAULT '',
													  `form_bg_custom` text,
													  `highlight_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
													  `highlight_bg_color` varchar(11) DEFAULT '',
													  `highlight_bg_pattern` varchar(50) DEFAULT '',
													  `highlight_bg_custom` text,
													  `guidelines_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
													  `guidelines_bg_color` varchar(11) DEFAULT '',
													  `guidelines_bg_pattern` varchar(50) DEFAULT '',
													  `guidelines_bg_custom` text,
													  `field_bg_type` varchar(11) NOT NULL DEFAULT 'color' COMMENT 'color,pattern,custom',
													  `field_bg_color` varchar(11) DEFAULT '',
													  `field_bg_pattern` varchar(50) DEFAULT '',
													  `field_bg_custom` text,
													  `form_title_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
													  `form_title_font_weight` int(11) NOT NULL DEFAULT '400',
													  `form_title_font_style` varchar(25) NOT NULL DEFAULT 'normal',
													  `form_title_font_size` varchar(11) DEFAULT '',
													  `form_title_font_color` varchar(11) DEFAULT '',
													  `form_desc_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
													  `form_desc_font_weight` int(11) NOT NULL DEFAULT '400',
													  `form_desc_font_style` varchar(25) NOT NULL DEFAULT 'normal',
													  `form_desc_font_size` varchar(11) DEFAULT '',
													  `form_desc_font_color` varchar(11) DEFAULT '',
													  `field_title_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
													  `field_title_font_weight` int(11) NOT NULL DEFAULT '400',
													  `field_title_font_style` varchar(25) NOT NULL DEFAULT 'normal',
													  `field_title_font_size` varchar(11) DEFAULT '',
													  `field_title_font_color` varchar(11) DEFAULT '',
													  `guidelines_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
													  `guidelines_font_weight` int(11) NOT NULL DEFAULT '400',
													  `guidelines_font_style` varchar(25) NOT NULL DEFAULT 'normal',
													  `guidelines_font_size` varchar(11) DEFAULT '',
													  `guidelines_font_color` varchar(11) DEFAULT '',
													  `section_title_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
													  `section_title_font_weight` int(11) NOT NULL DEFAULT '400',
													  `section_title_font_style` varchar(25) NOT NULL DEFAULT 'normal',
													  `section_title_font_size` varchar(11) DEFAULT '',
													  `section_title_font_color` varchar(11) DEFAULT '',
													  `section_desc_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
													  `section_desc_font_weight` int(11) NOT NULL DEFAULT '400',
													  `section_desc_font_style` varchar(25) NOT NULL DEFAULT 'normal',
													  `section_desc_font_size` varchar(11) DEFAULT '',
													  `section_desc_font_color` varchar(11) DEFAULT '',
													  `field_text_font_type` varchar(50) NOT NULL DEFAULT 'Lucida Grande',
													  `field_text_font_weight` int(11) NOT NULL DEFAULT '400',
													  `field_text_font_style` varchar(25) NOT NULL DEFAULT 'normal',
													  `field_text_font_size` varchar(11) DEFAULT '',
													  `field_text_font_color` varchar(11) DEFAULT '',
													  `border_form_width` int(11) NOT NULL DEFAULT '1',
													  `border_form_style` varchar(11) NOT NULL DEFAULT 'solid',
													  `border_form_color` varchar(11) DEFAULT '',
													  `border_guidelines_width` int(11) NOT NULL DEFAULT '1',
													  `border_guidelines_style` varchar(11) NOT NULL DEFAULT 'solid',
													  `border_guidelines_color` varchar(11) DEFAULT '',
													  `border_section_width` int(11) NOT NULL DEFAULT '1',
													  `border_section_style` varchar(11) NOT NULL DEFAULT 'solid',
													  `border_section_color` varchar(11) DEFAULT '',
													  `form_shadow_style` varchar(25) NOT NULL DEFAULT 'WarpShadow',
													  `form_shadow_size` varchar(11) NOT NULL DEFAULT 'large',
													  `form_shadow_brightness` varchar(11) NOT NULL DEFAULT 'normal',
													  `form_button_type` varchar(11) NOT NULL DEFAULT 'text',
													  `form_button_text` varchar(100) NOT NULL DEFAULT 'Submit',
													  `form_button_image` text,
													  `advanced_css` text,
													  PRIMARY KEY (`theme_id`),
													  KEY `theme_name` (`theme_name`)
													) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//insert into ap_form_themes table
		$query = "INSERT INTO `".MF_TABLE_PREFIX."form_themes` (`theme_id`, `status`, `theme_has_css`, `theme_name`, `theme_built_in`, `logo_type`, `logo_custom_image`, `logo_custom_height`, `logo_default_image`, `logo_default_repeat`, `wallpaper_bg_type`, `wallpaper_bg_color`, `wallpaper_bg_pattern`, `wallpaper_bg_custom`, `header_bg_type`, `header_bg_color`, `header_bg_pattern`, `header_bg_custom`, `form_bg_type`, `form_bg_color`, `form_bg_pattern`, `form_bg_custom`, `highlight_bg_type`, `highlight_bg_color`, `highlight_bg_pattern`, `highlight_bg_custom`, `guidelines_bg_type`, `guidelines_bg_color`, `guidelines_bg_pattern`, `guidelines_bg_custom`, `field_bg_type`, `field_bg_color`, `field_bg_pattern`, `field_bg_custom`, `form_title_font_type`, `form_title_font_weight`, `form_title_font_style`, `form_title_font_size`, `form_title_font_color`, `form_desc_font_type`, `form_desc_font_weight`, `form_desc_font_style`, `form_desc_font_size`, `form_desc_font_color`, `field_title_font_type`, `field_title_font_weight`, `field_title_font_style`, `field_title_font_size`, `field_title_font_color`, `guidelines_font_type`, `guidelines_font_weight`, `guidelines_font_style`, `guidelines_font_size`, `guidelines_font_color`, `section_title_font_type`, `section_title_font_weight`, `section_title_font_style`, `section_title_font_size`, `section_title_font_color`, `section_desc_font_type`, `section_desc_font_weight`, `section_desc_font_style`, `section_desc_font_size`, `section_desc_font_color`, `field_text_font_type`, `field_text_font_weight`, `field_text_font_style`, `field_text_font_size`, `field_text_font_color`, `border_form_width`, `border_form_style`, `border_form_color`, `border_guidelines_width`, `border_guidelines_style`, `border_guidelines_color`, `border_section_width`, `border_section_style`, `border_section_color`, `form_shadow_style`, `form_shadow_size`, `form_shadow_brightness`, `form_button_type`, `form_button_text`, `form_button_image`, `advanced_css`)
	VALUES
		(1,1,0,'Green Senegal',1,'default','http://',40,'machform.png',0,'color','#cfdfc5','','','color','#bad4a9','','','color','#ffffff','','','color','#ecf1ea','','','color','#ecf1ea','','','color','#cfdfc5','','','Philosopher',700,'normal','','#80af1b','Philosopher',400,'normal','100%','#80af1b','Philosopher',700,'normal','110%','#80af1b','Ubuntu',400,'normal','','#666666','Philosopher',700,'normal','110%','#80af1b','Philosopher',400,'normal','95%','#80af1b','Ubuntu',400,'normal','','#666666',1,'solid','#bad4a9',1,'dashed','#bad4a9',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(2,1,0,'Blue Bigbird',1,'default','http://',40,'machform.png',0,'color','#336699','','','color','#6699cc','','','color','#ffffff','','','color','#ccdced','','','color','#6699cc','','','color','#ffffff','','','Open Sans',600,'normal','','','Open Sans',400,'normal','','','Open Sans',700,'normal','100%','','Ubuntu',400,'normal','80%','#ffffff','Open Sans',600,'normal','','','Open Sans',400,'normal','95%','','Open Sans',400,'normal','','',1,'solid','#336699',1,'dotted','#6699cc',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(3,1,0,'Blue Pionus',1,'default','http://',40,'machform.png',0,'color','#556270','','','color','#6b7b8c','','','color','#ffffff','','','color','#99aec4','','','color','#6b7b8c','','','color','#ffffff','','','Istok Web',400,'normal','170%','','Maven Pro',400,'normal','100%','','Istok Web',700,'normal','100%','','Maven Pro',400,'normal','95%','#ffffff','Istok Web',400,'normal','110%','','Maven Pro',400,'normal','95%','','Maven Pro',400,'normal','','',1,'solid','#556270',1,'solid','#6b7b8c',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(4,1,0,'Brown Conure',1,'default','http://',40,'machform.png',0,'pattern','#948c75','pattern_036.gif','','color','#b3a783','','','color','#ffffff','','','color','#e0d0a2','','','color','#948c75','','','color','#f0f0d8','pattern_036.gif','','Molengo',400,'normal','170%','','Molengo',400,'normal','110%','','Molengo',400,'normal','110%','','Nobile',400,'normal','','#ececec','Molengo',400,'normal','130%','','Molengo',400,'normal','100%','','Molengo',400,'normal','110%','',1,'solid','#948c75',1,'solid','#948c75',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(5,1,0,'Yellow Lovebird',1,'default','http://',40,'machform.png',0,'color','#f0d878','','','color','#edb817','','','color','#ffffff','','','color','#f5d678','','','color','#f7c52e','','','color','#ffffff','','','Amaranth',700,'normal','170%','','Amaranth',400,'normal','100%','','Amaranth',700,'normal','100%','','Amaranth',400,'normal','','#444444','Amaranth',400,'normal','110%','','Amaranth',400,'normal','95%','','Amaranth',400,'normal','100%','',1,'solid','#f0d878',1,'solid','#f7c52e',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(6,1,0,'Pink Starling',1,'default','http://',40,'machform.png',0,'color','#ff6699','','','color','#d93280','','','color','#ffffff','','','color','#ffd0d4','','','color','#f9fad2','','','color','#ffffff','','','Josefin Sans',600,'normal','160%','','Josefin Sans',400,'normal','110%','','Josefin Sans',700,'normal','110%','','Josefin Sans',600,'normal','100%','','Josefin Sans',700,'normal','','','Josefin Sans',400,'normal','110%','','Josefin Sans',400,'normal','130%','',1,'solid','#ff6699',1,'dashed','#f56990',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(8,1,0,'Red Rabbit',1,'default','http://',40,'machform.png',0,'color','#a40802','','','color','#800e0e','','','color','#ffffff','','','color','#ffa4a0','','','color','#800e0e','','','color','#ffffff','','','Lobster',400,'normal','','#000000','Ubuntu',400,'normal','100%','#000000','Lobster',400,'normal','110%','#222222','Ubuntu',400,'normal','85%','#ffffff','Lobster',400,'normal','130%','#000000','Ubuntu',400,'normal','95%','#000000','Ubuntu',400,'normal','','#333333',1,'solid','#a40702',1,'solid','#800e0e',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(9,1,0,'Orange Robin',1,'default','http://',40,'machform.png',0,'color','#f38430','','','color','#fa6800','','','color','#ffffff','','','color','#a7dbd8','','','color','#e0e4cc','','','color','#ffffff','','','Lucida Grande',400,'normal','','#000000','Nobile',400,'normal','','#000000','Nobile',700,'normal','','#000000','Lucida Grande',400,'normal','','#444444','Nobile',700,'normal','100%','#000000','Nobile',400,'normal','','#000000','Nobile',400,'normal','95%','#333333',1,'solid','#f38430',1,'solid','#e0e4cc',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(10,1,0,'Orange Sunbird',1,'default','http://',40,'machform.png',0,'color','#d95c43','','','color','#c02942','','','color','#ffffff','','','color','#d95c43','','','color','#53777a','','','color','#ffffff','','','Lucida Grande',400,'normal','','#000000','Lucida Grande',400,'normal','','#000000','Lucida Grande',700,'normal','','#222222','Lucida Grande',400,'normal','','#ffffff','Lucida Grande',400,'normal','','#000000','Lucida Grande',400,'normal','','#000000','Lucida Grande',400,'normal','','#333333',1,'solid','#d95c43',1,'solid','#53777a',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(11,1,0,'Green Ringneck',1,'default','http://',40,'machform.png',0,'color','#0b486b','','','color','#3b8686','','','color','#ffffff','','','color','#cff09e','','','color','#79bd9a','','','color','#a8dba8','','','Delius Swash Caps',400,'normal','','#000000','Delius Swash Caps',400,'normal','100%','#000000','Delius Swash Caps',400,'normal','100%','#222222','Delius',400,'normal','85%','#ffffff','Delius Swash Caps',400,'normal','','#000000','Delius Swash Caps',400,'normal','95%','#000000','Delius',400,'normal','','#515151',1,'solid','#0b486b',1,'solid','#79bd9a',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(12,1,0,'Brown Finch',1,'default','http://',40,'machform.png',0,'color','#774f38','','','color','#e08e79','','','color','#ffffff','','','color','#ece5ce','','','color','#c5e0dc','','','color','#f9fad2','','','Arvo',700,'normal','','#000000','Arvo',400,'normal','','#000000','Arvo',700,'normal','','#222222','Arvo',400,'normal','','#444444','Arvo',400,'normal','','#000000','Arvo',400,'normal','85%','#000000','Arvo',400,'normal','','#333333',1,'solid','#774f38',1,'dashed','#e08e79',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(14,1,0,'Brown Macaw',1,'default','http://',40,'machform.png',0,'color','#413e4a','','','color','#73626e','','','pattern','#ffffff','pattern_022.gif','','color','#f0b49e','','','color','#b38184','','','color','#ffffff','','','Cabin',500,'normal','160%','#000000','Cabin',400,'normal','100%','#000000','Cabin',700,'normal','110%','#222222','Lucida Grande',400,'normal','','#ececec','Cabin',600,'normal','','#000000','Cabin',600,'normal','95%','#000000','Cabin',400,'normal','110%','#333333',1,'solid','#413e4a',1,'dotted','#ff9900',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(15,1,0,'Pink Thrush',1,'default','http://',40,'machform.png',0,'color','#ff9f9d','','','color','#ff3d7e','','','color','#ffffff','','','color','#7fc7af','','','color','#3fb8b0','','','color','#ffffff','','','Crafty Girls',400,'normal','','#000000','Crafty Girls',400,'normal','100%','#000000','Crafty Girls',400,'normal','100%','#222222','Nobile',400,'normal','80%','#ffffff','Crafty Girls',400,'normal','','#000000','Crafty Girls',400,'normal','95%','#000000','Molengo',400,'normal','110%','#333333',1,'solid','#ff9f9d',1,'solid','#3fb8b0',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(16,1,0,'Yellow Bulbul',1,'default','http://',40,'machform.png',0,'color','#f8f4d7','','','color','#f4b26c','','','color','#f4dec2','','','color','#f2b4a7','','','color','#e98976','','','color','#ffffff','','','Special Elite',400,'normal','','#000000','Special Elite',400,'normal','','#000000','Special Elite',400,'normal','95%','#222222','Cousine',400,'normal','80%','#ececec','Special Elite',400,'normal','','#000000','Special Elite',400,'normal','','#000000','Cousine',400,'normal','','#333333',1,'solid','#f8f4d7',1,'solid','#f4b26c',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(17,1,0,'Blue Canary',1,'default','http://',40,'machform.png',0,'color','#81a8b8','','','color','#a4bcc2','','','color','#ffffff','','','color','#e8f3f8','','','color','#dbe6ec','','','color','#ffffff','','','PT Sans',400,'normal','','#000000','PT Sans',400,'normal','100%','#000000','PT Sans',700,'normal','100%','#222222','PT Sans',400,'normal','','#666666','PT Sans',700,'normal','','#000000','PT Sans',400,'normal','100%','#000000','PT Sans',400,'normal','110%','#333333',1,'solid','#81a8b8',1,'dashed','#a4bcc2',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(18,1,0,'Red Mockingbird',1,'default','http://',40,'machform.png',0,'color','#6b0103','','','color','#a30005','','','color','#c21b01','','','color','#f03d02','','','color','#1c0113','','','color','#ffffff','','','Oswald',400,'normal','','#ffffff','Open Sans',400,'normal','','#ffffff','Oswald',400,'normal','95%','#ffffff','Open Sans',400,'normal','','#ececec','Oswald',400,'normal','','#ececec','Lucida Grande',400,'normal','','#ffffff','Open Sans',400,'normal','','#333333',1,'solid','#6b0103',1,'solid','#1c0113',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(13,1,0,'Green Sparrow',1,'default','http://',40,'machform.png',0,'color','#d1f2a5','','','color','#f56990','','','color','#ffffff','','','color','#ffc48c','','','color','#ffa080','','','color','#ffffff','','','Open Sans',400,'normal','','#000000','Open Sans',400,'normal','','#000000','Open Sans',700,'normal','','#222222','Ubuntu',400,'normal','85%','#f4fce8','Open Sans',600,'normal','','#000000','Open Sans',400,'normal','95%','#000000','Open Sans',400,'normal','','#333333',10,'solid','#f0fab4',1,'solid','#ffa080',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(21,1,0,'Purple Vanga',1,'default','http://',40,'machform.png',0,'color','#7b85e2','','','color','#7aa6d6','','','color','#d1e7f9','','','color','#7aa6d6','','','color','#fbfcd0','','','color','#ffffff','','','Droid Sans',400,'normal','160%','#444444','Droid Sans',400,'normal','95%','#444444','Open Sans',700,'normal','95%','#444444','Droid Sans',400,'normal','85%','#444444','Droid Sans',400,'normal','110%','#444444','Droid Sans',400,'normal','95%','#000000','Droid Sans',400,'normal','100%','#333333',0,'solid','#CCCCCC',1,'solid','#fbfcd0',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(22,1,0,'Purple Dove',1,'default','http://',40,'machform.png',0,'color','#c0addb','','','color','#a662de','','','pattern','#ffffff','pattern_044.gif','','color','#a662de','','','color','#a662de','','','color','#c0addb','','','Pacifico',400,'normal','180%','#000000','Open Sans',400,'normal','95%','#000000','Pacifico',400,'normal','95%','#222222','Open Sans',400,'normal','80%','#ececec','Pacifico',400,'normal','110%','#000000','Open Sans',400,'normal','95%','#000000','Open Sans',400,'normal','100%','#333333',0,'solid','#a662de',1,'dashed','#CCCCCC',1,'dashed','#a662de','StandShadow','large','dark','text','Submit','http://',''),
		(20,1,0,'Pink Flamingo',1,'default','http://',40,'machform.png',0,'color','#f87d7b','','','color','#5ea0a3','','','color','#ffffff','','','color','#fab97f','','','color','#dcd1b4','','','color','#ffffff','','','Lucida Grande',400,'normal','160%','#b05573','Lucida Grande',400,'normal','95%','#b05573','Lucida Grande',700,'normal','95%','#b05573','Lucida Grande',400,'normal','80%','#444444','Lucida Grande',400,'normal','110%','#b05573','Lucida Grande',400,'normal','85%','#b05573','Lucida Grande',400,'normal','100%','#333333',0,'solid','#f87d7b',1,'dotted','#fab97f',1,'dotted','#CCCCCC','WarpShadow','large','normal','text','Submit','http://',''),
		(19,1,0,'Yellow Kiwi',1,'default','http://',40,'machform.png',0,'color','#ffe281','','','color','#ffbb7f','','','color','#eee9e5','','','color','#fad4b2','','','color','#ff9c97','','','color','#ffffff','','','Lucida Grande',400,'normal','160%','#000000','Lucida Grande',400,'normal','95%','#000000','Lucida Grande',700,'normal','95%','#222222','Lucida Grande',400,'normal','80%','#ffffff','Lucida Grande',400,'normal','110%','#000000','Lucida Grande',400,'normal','85%','#000000','Lucida Grande',400,'normal','100%','#333333',1,'solid','#ffe281',1,'solid','#CCCCCC',1,'dotted','#cdcdcd','WarpShadow','large','normal','text','Submit','http://','');";
		
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//8. Create table ap_settings
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."settings` (
													  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
													  `smtp_enable` tinyint(1) NOT NULL DEFAULT '0',
													  `smtp_host` varchar(255) NOT NULL DEFAULT 'localhost',
													  `smtp_port` int(11) NOT NULL DEFAULT '25',
													  `smtp_auth` tinyint(1) NOT NULL DEFAULT '0',
													  `smtp_username` varchar(255) DEFAULT NULL,
													  `smtp_password` varchar(255) DEFAULT NULL,
													  `smtp_secure` tinyint(1) NOT NULL DEFAULT '0',
													  `upload_dir` varchar(255) NOT NULL DEFAULT './data',
													  `data_dir` varchar(255) NOT NULL DEFAULT './data',
													  `default_from_name` varchar(255) NOT NULL DEFAULT 'MachForm',
													  `default_from_email` varchar(255) DEFAULT NULL,
													  `base_url` varchar(255) DEFAULT NULL,
													  `form_manager_max_rows` int(11) DEFAULT '10',
													  `form_manager_sort_by` varchar(25) DEFAULT NULL,
													  `admin_login` varchar(255) NOT NULL DEFAULT '',
													  `admin_password` varchar(255) NOT NULL DEFAULT '',
													  `cookie_hash` varchar(25) DEFAULT NULL,
													  `admin_image_url` varchar(255) DEFAULT NULL,
													  `disable_machform_link` int(1) DEFAULT '0',
													  `customer_id` varchar(100) DEFAULT NULL,
													  `customer_name` varchar(100) DEFAULT NULL,
													  `license_key` varchar(50) DEFAULT NULL,
													  `machform_version` varchar(10) NOT NULL DEFAULT '3.3',
													  PRIMARY KEY (`id`)
													) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//9. Insert into ap_settings table
		$domain = str_replace('www.','',$_SERVER['SERVER_NAME']);
		$default_from_email = "no-reply@{$domain}";

		if(!empty($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] != 'off')){
			$ssl_suffix = 's';
		}else if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https'){
            $ssl_suffix = 's';
        }else if (isset($_SERVER['HTTP_FRONT_END_HTTPS']) && $_SERVER['HTTP_FRONT_END_HTTPS'] == 'on'){
            $ssl_suffix = 's';
        }else{
			$ssl_suffix = '';
		}
		$machform_base_url = 'http'.$ssl_suffix.'://'.$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\').'/';

		$hasher = new PasswordHash(8, FALSE);
		$default_password_hash = $hasher->HashPassword('machform');

		$query = "INSERT INTO `".MF_TABLE_PREFIX."settings` (`id`, 
																	`smtp_enable`, 
																	`smtp_host`, 
																	`smtp_port`, 
																	`smtp_auth`, 
																	`smtp_username`, 
																	`smtp_password`, 
																	`smtp_secure`, 
																	`upload_dir`, 
																	`data_dir`, 
																	`default_from_name`, 
																	`default_from_email`, 
																	`base_url`, 
																	`form_manager_max_rows`, 
																	`form_manager_sort_by`, 
																	`admin_login`, 
																	`admin_password`, 
																	`cookie_hash`, 
																	`admin_image_url`, 
																	`disable_machform_link`,
																	`license_key`,
																	`machform_version`)
															VALUES
																	(1,
																	 0,
																	'localhost',
																	25,
																	0,
																	'',
																	'',
																	0,
																	'./data',
																	'./data',
																	'MachForm',
																	'{$default_from_email}',
																	'{$machform_base_url}',
																	10,
																	'date_created',
																	'{$admin_username}',
																	'{$default_password_hash}',
																	'',
																	'',
																	0,
																	'{$license_key}',
																	'{$new_machform_version}');";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//10. Loop through each form table and alter table structure
		$query = "select `form_id`,`form_email`,`esr_email_address`,`form_redirect` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
				
		$email_enable_status_array = array();
		$redirect_enable_status_array = array();
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;

			if(!empty($row['form_email'])){
				$email_enable_status_array[$form_id]['esl_enable'] = 1;
			}else{
				$email_enable_status_array[$form_id]['esl_enable'] = 0;
			}

			if(!empty($row['esr_email_address'])){
				$email_enable_status_array[$form_id]['esr_enable'] = 1;
			}else{
				$email_enable_status_array[$form_id]['esr_enable'] = 0;
			}

			if(!empty($row['form_redirect'])){
				$redirect_enable_status_array[$form_id] = 1;
			}else{
				$redirect_enable_status_array[$form_id] = 0;
			}
		}
				
		foreach ($form_id_array as $form_id) {
			//add new columns
			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}`
													  ADD COLUMN `status` int(4) unsigned NOT NULL DEFAULT '1',
													  ADD COLUMN `resume_key` varchar(10) default NULL;";
			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				$post_install_error .= $e->getMessage().'<br/><br/>';
			}

			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}_review`
													  ADD COLUMN `status` int(4) unsigned NOT NULL DEFAULT '1',
													  ADD COLUMN `resume_key` varchar(10) default NULL;";
			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				//do nothing, ignore if table review not exist
			}

			//update the esl_enable/esr_enable/redirect_enable
			$query = "UPDATE `".MF_TABLE_PREFIX."forms` SET esl_enable = ?,esr_enable = ?,form_redirect_enable = ? WHERE form_id = ?";
					
			$params = array($email_enable_status_array[$form_id]['esl_enable'],$email_enable_status_array[$form_id]['esr_enable'],$redirect_enable_status_array[$form_id],$form_id);
					
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				$post_install_error .= $e->getMessage().'<br/><br/>';
			}
		}

		//11. Loop through each CSS file and create a theme for each form
				
		//first delete htaccess file if exist
		if(file_exists('./data/.htaccess')){
			@unlink('./data/.htaccess');
		}		
				
		//Create "themes" folder
		if(is_writable("./data")){
			$old_mask = umask(0);
			mkdir("./data/themes",0755);
			umask($old_mask);
		}

		foreach ($form_id_array as $form_id) {
			$advanced_css = '';

			if(file_exists("./data/form_{$form_id}/css/view.css")){
				rename("./data/form_{$form_id}/css/view.css", "./data/form_{$form_id}/css/view.old.css");

				//copy default view.css to css folder
				$old_mask = umask(0);
				if(copy("./view.css","./data/form_{$form_id}/css/view.css")){
					$form_has_css = 1;
				}else{
					$form_has_css = 0;
				}
				umask($old_mask);

				//update form_has_css value
				$query = "UPDATE ".MF_TABLE_PREFIX."forms set form_has_css=? where form_id=?";
				$params = array($form_has_css,$form_id);
				$sth = $dbh->prepare($query);
				try{
					$sth->execute($params);
				}catch(PDOException $e) {
					$post_install_error .= $e->getMessage().'<br/><br/>';
				}


				$advanced_css = file_get_contents("./data/form_{$form_id}/css/view.old.css"); //store the old view.css content as advanced code
			
				//insert into ap_form_themes  table
				$query = "INSERT INTO 
								`".MF_TABLE_PREFIX."form_themes` 
										( 
										`status`, 
										`theme_has_css`, 
										`theme_name`, 
										`theme_built_in`, 
										`logo_type`, 
										`logo_custom_image`, 
										`logo_custom_height`, 
										`logo_default_image`, 
										`logo_default_repeat`, 
										`wallpaper_bg_type`, 
										`wallpaper_bg_color`, 
										`wallpaper_bg_pattern`, 
										`wallpaper_bg_custom`, 
										`header_bg_type`, 
										`header_bg_color`, 
										`header_bg_pattern`, 
										`header_bg_custom`, 
										`form_bg_type`, 
										`form_bg_color`, 
										`form_bg_pattern`, 
										`form_bg_custom`, 
										`highlight_bg_type`, 
										`highlight_bg_color`, 
										`highlight_bg_pattern`, 
										`highlight_bg_custom`, 
										`guidelines_bg_type`, 
										`guidelines_bg_color`, 
										`guidelines_bg_pattern`, 
										`guidelines_bg_custom`, 
										`field_bg_type`, 
										`field_bg_color`, 
										`field_bg_pattern`, 
										`field_bg_custom`, 
										`form_title_font_type`, 
										`form_title_font_weight`, 
										`form_title_font_style`, 
										`form_title_font_size`, 
										`form_title_font_color`, 
										`form_desc_font_type`, 
										`form_desc_font_weight`, 
										`form_desc_font_style`, 
										`form_desc_font_size`, 
										`form_desc_font_color`, 
										`field_title_font_type`, 
										`field_title_font_weight`, 
										`field_title_font_style`, 
										`field_title_font_size`, 
										`field_title_font_color`, 
										`guidelines_font_type`, 
										`guidelines_font_weight`, 
										`guidelines_font_style`, 
										`guidelines_font_size`, 
										`guidelines_font_color`, 
										`section_title_font_type`, 
										`section_title_font_weight`, 
										`section_title_font_style`, 
										`section_title_font_size`, 
										`section_title_font_color`, 
										`section_desc_font_type`, 
										`section_desc_font_weight`, 
										`section_desc_font_style`, 
										`section_desc_font_size`, 
										`section_desc_font_color`, 
										`field_text_font_type`, 
										`field_text_font_weight`, 
										`field_text_font_style`, 
										`field_text_font_size`, 
										`field_text_font_color`, 
										`border_form_width`, 
										`border_form_style`, 
										`border_form_color`, 
										`border_guidelines_width`, 
										`border_guidelines_style`, 
										`border_guidelines_color`, 
										`border_section_width`, 
										`border_section_style`, 
										`border_section_color`, 
										`form_shadow_style`, 
										`form_shadow_size`, 
										`form_shadow_brightness`, 
										`form_button_type`, 
										`form_button_text`, 
										`form_button_image`, 
										`advanced_css`)
								VALUES
									(1,0,?,0,'default','http://',40,'machform.png',0,'color','#ececec','','','color','#DEDEDE','','',
									'color','#ffffff','','','color','#FFF7C0','','','color','#F5F5F5','','','color','#ffffff','','','Lucida Grande',
									400,'normal','160%','#000000','Lucida Grande',400,'normal','95%','#000000','Lucida Grande',700,'normal','95%','#222222',
									'Lucida Grande',400,'normal','80%','#444444','Lucida Grande',400,'normal','110%','#000000','Lucida Grande',400,'normal',
									'85%','#000000','Lucida Grande',400,'normal','100%','#333333',1,'solid','#CCCCCC',1,'solid','#CCCCCC',1,'dotted','#CCCCCC',
									'WarpShadow','large','normal','text','Submit','http://',?);"; 
				$theme_name = 'Form #'.$form_id.' Theme';

				$params = array($theme_name,$advanced_css);
				$sth = $dbh->prepare($query);
				try{
					$sth->execute($params);
				}catch(PDOException $e) {
					$post_install_error .= $e->getMessage().'<br/><br/>';
				}
				
				$theme_id = (int) $dbh->lastInsertId();

				//create/update the CSS file for the theme
				$css_theme_filename = "./data/themes/theme_{$theme_id}.css";
				$css_theme_content  = mf_theme_get_css_content($dbh,$theme_id);
				
				$fpc_result = @file_put_contents($css_theme_filename,$css_theme_content);
				
				if(!empty($fpc_result)){ //if we're able to write into the css file, set the 'theme_has_css' to 1
					$params = array(1,$theme_id);
					$query = "UPDATE ".MF_TABLE_PREFIX."form_themes SET theme_has_css = ? WHERE theme_id = ?";
					
					$sth = $dbh->prepare($query);
					try{
						$sth->execute($params);
					}catch(PDOException $e) {
						$post_install_error .= $e->getMessage().'<br/><br/>';
					}
				}

				//update ap_forms table to use the new theme
				$query = "UPDATE ".MF_TABLE_PREFIX."forms set form_theme_id=? where form_id=?";

				$params = array($theme_id,$form_id);
				$sth = $dbh->prepare($query);
				try{
					$sth->execute($params);
				}catch(PDOException $e) {
					$post_install_error .= $e->getMessage().'<br/><br/>';
				}
				
			} //end file_exists
		} //end foreach form_id_array



		return $post_install_error;

	}

	/***************************************************************************
	 Changelog 3.0 to 3.2 												   
	 
	 - ap_settings: added 'admin_theme' column
	 - ap_form_elements: added 'element_section_display_in_email' default(0),'element_section_enable_scroll' default(0) column
	 - added .section_scroll_small,.section_scroll_medium,.section_scroll_large definition to all view.css for each form
	 - added .mf_review_section_break definition to all view.css
	 - added .mf_canvas_pad,.mf_sig_wrapper,.mf_sigpad_clear to all view.css
	 - added built-in class, .column_2 to .column_6,.new_row,.hidden,.guidelines_bottom

	 there wasn't any database change within 3.1
	 thus there is only this 3.0 to 3.2 update path
	***************************************************************************/
	
	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time

	function do_delta_update_3_0_to_3_2($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//alter table ap_settings, add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."settings` ADD COLUMN `admin_theme` varchar(11) DEFAULT NULL;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//alter table ap_form_elements, add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` 
															ADD COLUMN `element_section_display_in_email` int(1) NOT NULL DEFAULT '0',
  													  		ADD COLUMN `element_section_enable_scroll` int(1) NOT NULL DEFAULT '0';";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//loop through each view.css file and add new classes
		$query  = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
	
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		$new_css_code = <<<EOT
.section_scroll_small{
	height: 5em;
	overflow-y: scroll;
}
.section_scroll_medium{
	height: 10em;
	overflow-y: scroll;
}
.section_scroll_large{
	height: 20em;
	overflow-y: scroll;
}
#machform_review_table td.mf_review_section_break{
	padding: 10px 5px;
}
/** Built-in Class **/
#main_body form li{
	clear: both;
}
#main_body form li.column_2{
  width: 47%;
  float: left;
  clear: none !important;
}
#main_body form li.column_3{
	width: 31%;
	float: left;
	clear: none !important;
}
#main_body form li.column_4{
	width: 22%;
  	float: left;
	clear: none !important;
}
#main_body form li.column_5{
	width: 17%;
	float: left;
	clear: none !important;
}
#main_body form li.column_6{
	width: 14%;
	float: left;
	clear: none !important;
}
#main_body form li.new_row{
	clear: left !important;
}
#main_body form li.hidden{
	display: none;
}
#main_body form li.guidelines_bottom .guidelines
{
	background: none !important;
	border: none !important;
	font-size:105%;
	line-height:100%;
	margin: 0 !important;
    padding: 0 0 5px;
	visibility:visible;
	width:100%;
	position: static;

}
EOT;
		foreach ($form_id_array as $form_id) {
			$target_css_file = $mf_settings['data_dir']."/form_{$form_id}/css/view.css";
			if(file_exists($target_css_file) && is_writable($target_css_file)){
				file_put_contents($target_css_file, $new_css_code, FILE_APPEND);
			}
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 3.2 to 3.3 												   
	 
	 - new table ap_users
	 - new table ap_permissions
	 - new table ap_entries_preferences
	 - new table ap_form_locks
	 - new table ap_form_sorts

	 - ap_form_filters: added 'user_id' column
	 - ap_column_preferences: added 'user_id' column
	 - ap_form_themes: added 'user_id','theme_is_private' columns 

	 - delete columns from ap_forms: entries_sort_by, entries_enable_filter, entries_filter_type.... move the records into ap_entries_preferences table and set user_id to 1
	 - delete column from ap_settings: form_manager_sort_by and move the record into ap_form_sorts table

	 - copy admin login data to ap_users data and then delete the columns (admin_login,admin_password,cookie_hash), set admin user_id = 1

	 - create index.html file to each "files" folder and to the "data" folder
	***************************************************************************/
	
	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time

	function do_delta_update_3_2_to_3_3($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Create table ap_users
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."users` (
												  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
												  `user_email` varchar(255) NOT NULL DEFAULT '',
												  `user_password` varchar(255) NOT NULL DEFAULT '',
												  `user_fullname` varchar(255) NOT NULL DEFAULT '',
												  `priv_administer` tinyint(1) NOT NULL DEFAULT '0',
												  `priv_new_forms` tinyint(1) NOT NULL DEFAULT '0',
												  `priv_new_themes` tinyint(1) NOT NULL DEFAULT '0',
												  `last_login_date` datetime DEFAULT NULL,
												  `last_ip_address` varchar(15) DEFAULT '',
												  `cookie_hash` varchar(255) DEFAULT '',
												  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 - deleted; 1 - active; 2 - suspended',
												  PRIMARY KEY (`user_id`)
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Create table ap_permissions
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."permissions` (
												  `form_id` bigint(11) unsigned NOT NULL,
												  `user_id` int(11) unsigned NOT NULL,
												  `edit_form` tinyint(1) NOT NULL DEFAULT '0',
												  `edit_entries` tinyint(1) NOT NULL DEFAULT '0',
												  `view_entries` tinyint(1) NOT NULL DEFAULT '0',
												  PRIMARY KEY (`form_id`,`user_id`)
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Create table ap_entries_preferences
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."entries_preferences` (
												  `form_id` int(11) NOT NULL,
												  `user_id` int(11) NOT NULL,
												  `entries_sort_by` varchar(100) NOT NULL DEFAULT 'id-desc',
												  `entries_enable_filter` int(1) NOT NULL DEFAULT '0',
												  `entries_filter_type` varchar(5) NOT NULL DEFAULT 'all' COMMENT 'all or any'
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Create table ap_form_locks
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_locks` (
												  `form_id` int(11) NOT NULL,
												  `user_id` int(11) NOT NULL,
												  `lock_date` datetime NOT NULL
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Create table ap_form_sorts
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_sorts` (
												  `user_id` int(11) NOT NULL,
												  `sort_by` varchar(25) DEFAULT '',
												  PRIMARY KEY (`user_id`)
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}
		
		//6. Alter table ap_form_filters. Add 'user_id' column
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_filters` ADD COLUMN `user_id` int(11) NOT NULL DEFAULT '1';";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//7. Alter table ap_column_preferences. Add 'user_id' column
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."column_preferences` ADD COLUMN `user_id` int(11) NOT NULL DEFAULT '1';";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//8. Alter table ap_form_themes. Add 'user_id' and 'theme_is_private' column
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_themes`
													  ADD COLUMN `user_id` int(11) NOT NULL DEFAULT '1',
													  ADD COLUMN `theme_is_private` int(11) NOT NULL DEFAULT '1';";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//9. Alter table ap_forms. Delete columns: entries_sort_by, entries_enable_filter, entries_filter_type 
		//   Move the records into ap_entries_preferences table first and set user_id to 1
		$query = "INSERT INTO ".MF_TABLE_PREFIX."entries_preferences(
													form_id,
													user_id,
													entries_sort_by,
													entries_enable_filter,
													entries_filter_type) 
											  SELECT 
											 		form_id,
											 		'1' as user_id,
											 		entries_sort_by,
											 		entries_enable_filter,
											 		entries_filter_type 
											 	FROM 
											 		".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		$query = "ALTER TABLE ".MF_TABLE_PREFIX."forms DROP COLUMN `entries_sort_by`,DROP COLUMN `entries_enable_filter`,DROP COLUMN `entries_filter_type`;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//10. Alter table ap_settings. Delete column 'form_manager_sort_by'
		//    Move the record value into ap_form_sorts table
		$query = "INSERT INTO ".MF_TABLE_PREFIX."form_sorts(user_id,sort_by) SELECT '1' as user_id,form_manager_sort_by FROM ".MF_TABLE_PREFIX."settings";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		$query = "ALTER TABLE ".MF_TABLE_PREFIX."settings DROP COLUMN `form_manager_sort_by`;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//11. Copy admin login data to ap_users and then delete columns: admin_login,admin_password,cookie_hash
		//    Set user_id = 1
		$query = "INSERT INTO 
							 ".MF_TABLE_PREFIX."users(
		   							  user_id,
		   							  user_email,
		   							  user_password,
		   							  user_fullname,
		   							  priv_administer,
		   							  priv_new_forms,
		   							  priv_new_themes,
		   							  cookie_hash,
		   							  `status`)
								SELECT 
									  '1' as user_id,
									  admin_login,
									  admin_password,
									  'Administrator' as user_fullname, 
									  '1' as priv_administer, 
									  '1' as priv_new_forms,
									  '1' as priv_new_themes,
									  cookie_hash,
									  '1' as `status` 
								  FROM 
									  ".MF_TABLE_PREFIX."settings";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		$query = "ALTER TABLE ".MF_TABLE_PREFIX."settings DROP COLUMN `admin_login`,DROP COLUMN `admin_password`,DROP COLUMN `cookie_hash`;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//12. Loop through each "files" folder and to "data" folder. Create an empty "index.html" file.
		$query = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
				
		$form_id_array = array();
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];

			if(is_writable($mf_settings['upload_dir']."/form_{$form_id}/files")){
				@file_put_contents($mf_settings['upload_dir']."/form_{$form_id}/files/index.html",' ');
			}
		}

		if(is_writable("./data")){
			@file_put_contents("./data/index.html",' ');
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 3.3 to 3.4 												   
	 
	 - new table ap_field_logic_elements
	 - new table ap_field_logic_conditions
	 - new table ap_form_payments
	 - new table ap_page_logic
	 - new table ap_page_logic_conditions

	 - ap_forms: added columns 'logic_field_enable', logic_page_enable, payment_enable_trial, payment_trial_period, payment_trial_unit, payment_trial_amount, payment_stripe_live_secret_key, 
	 							payment_stripe_live_public_key, payment_stripe_test_secret_key, payment_stripe_test_public_key, payment_stripe_enable_test_mode, payment_enable_invoice, 
	 							payment_delay_notifications, payment_ask_billing, payment_ask_shipping, payment_invoice_email, payment_paypal_enable_test_mode 
	 - update ap_forms records, set the value of 'payment_delay_notifications' to 0 for all records. so that all existing paypal payments will still working as it is now.

	 - add these CSS code to all view.css files on all forms:

		a) #main_body select.select { background-image: none; }
		b) #main_body form li.guidelines_bottom .guidelines { clear: both; }
		c) everything under 'Payment Page'
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	
	function do_delta_update_3_3_to_3_4($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Create table ap_field_logic_elements
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."field_logic_elements` (
																		  `form_id` int(11) NOT NULL,
																		  `element_id` int(11) NOT NULL,
																		  `rule_show_hide` varchar(4) NOT NULL DEFAULT 'show',
																		  `rule_all_any` varchar(3) NOT NULL DEFAULT 'all',
																		  PRIMARY KEY (`form_id`,`element_id`)
																		) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Create table ap_field_logic_conditions
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."field_logic_conditions` (
																		  `alc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																		  `form_id` int(11) NOT NULL,
																		  `target_element_id` int(11) NOT NULL,
																		  `element_name` varchar(50) NOT NULL DEFAULT '',
																		  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
																		  `rule_keyword` varchar(255) DEFAULT NULL,
																		  PRIMARY KEY (`alc_id`),
																		  KEY `form_id` (`form_id`,`target_element_id`)
																		) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Create table ap_form_payments
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_payments` (
																  `afp_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																  `form_id` int(11) unsigned NOT NULL,
																  `record_id` int(11) unsigned NOT NULL,
																  `payment_id` varchar(255) DEFAULT NULL,
																  `date_created` datetime DEFAULT NULL,
																  `payment_date` datetime DEFAULT NULL,
																  `payment_status` varchar(255) DEFAULT NULL,
																  `payment_fullname` varchar(255) DEFAULT NULL,
																  `payment_amount` decimal(62,2) NOT NULL DEFAULT '0.00',
																  `payment_currency` varchar(3) NOT NULL DEFAULT 'usd',
																  `payment_test_mode` int(1) NOT NULL DEFAULT '0',
																  `payment_merchant_type` varchar(25) DEFAULT NULL,
																  `status` int(1) NOT NULL DEFAULT '1',
																  `billing_street` varchar(255) DEFAULT NULL,
																  `billing_city` varchar(255) DEFAULT NULL,
																  `billing_state` varchar(255) DEFAULT NULL,
																  `billing_zipcode` varchar(255) DEFAULT NULL,
																  `billing_country` varchar(255) DEFAULT NULL,
																  `same_shipping_address` int(1) NOT NULL DEFAULT '1',
																  `shipping_street` varchar(255) DEFAULT NULL,
																  `shipping_city` varchar(255) DEFAULT NULL,
																  `shipping_state` varchar(255) DEFAULT NULL,
																  `shipping_zipcode` varchar(255) DEFAULT NULL,
																  `shipping_country` varchar(255) DEFAULT NULL,
																   PRIMARY KEY (`afp_id`)
																  ) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Create table ap_page_logic
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."page_logic` (
																`form_id` int(11) NOT NULL,
															  	`page_id` varchar(15) NOT NULL DEFAULT '',
															  	`rule_all_any` varchar(3) NOT NULL DEFAULT 'all',
															  	 PRIMARY KEY (`form_id`,`page_id`)
															   ) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Create table ap_page_logic_conditions
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."page_logic_conditions` (
																		   `apc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
																		   `form_id` int(11) NOT NULL,
																		   `target_page_id` varchar(15) NOT NULL DEFAULT '',
																		   `element_name` varchar(50) NOT NULL DEFAULT '',
																		   `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
																		   `rule_keyword` varchar(255) DEFAULT NULL,
																		    PRIMARY KEY (`apc_id`),
																		    KEY `form_id` (`form_id`,`target_page_id`)
															   			  ) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//6. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` 
														  ADD COLUMN `logic_field_enable` tinyint(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `logic_page_enable` tinyint(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_enable_trial` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_trial_period` int(11) NOT NULL DEFAULT '1',
														  ADD COLUMN `payment_trial_unit` varchar(5) NOT NULL DEFAULT 'month',
														  ADD COLUMN `payment_trial_amount` decimal(62,2) NOT NULL DEFAULT '0.00',
														  ADD COLUMN `payment_stripe_live_secret_key` varchar(50) DEFAULT NULL,
											  			  ADD COLUMN `payment_stripe_live_public_key` varchar(50) DEFAULT NULL,
											  			  ADD COLUMN `payment_stripe_test_secret_key` varchar(50) DEFAULT NULL,
											  			  ADD COLUMN `payment_stripe_test_public_key` varchar(50) DEFAULT NULL,
											  			  ADD COLUMN `payment_stripe_enable_test_mode` int(1) NOT NULL DEFAULT '0',
											  			  ADD COLUMN `payment_paypal_enable_test_mode` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_enable_invoice` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_invoice_email` varchar(255) DEFAULT NULL,
														  ADD COLUMN `payment_delay_notifications` int(1) NOT NULL DEFAULT '1',
														  ADD COLUMN `payment_ask_billing` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_ask_shipping` int(1) NOT NULL DEFAULT '0';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//7. Update ap_forms records, set the value of 'payment_delay_notifications' to 0 for all records. 
		//so that all existing paypal payments will still working as it is now.
		$query = "UPDATE `".MF_TABLE_PREFIX."forms` SET `payment_delay_notifications`=0";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//8. Loop through each form CSS file and add new CSS code
		$query  = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
	
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		$new_css_code = <<<EOT

#main_body select.select { background-image: none; }
#main_body form li.guidelines_bottom .guidelines { clear: both; }
#main_body ul.payment_summary{
	overflow: hidden;
}
#main_body form li.payment_summary_list{
	border-right: 1px dashed #ccc;
	padding-right: 10px;
	width: 70%;
	float: right;
	clear: none;
	text-align: right;
}
#main_body form li.payment_summary_amount{
	width: auto;
	float: right;
	clear: none;
}
#main_body form ul.payment_list_items li{
	width: 98%;
	font-size: 95%;
	padding-top: 0px;
	padding-bottom: 5px;
}
#main_body form ul.payment_list_items li span{
	margin: 0px;
	float: right;
	display: block;
	font-weight: bold;
	padding: 0px;
	padding-left: 10px;
	color: inherit;
}
#main_body form li.payment_summary_term{
	text-align: right;
	font-size: 90%;
	padding: 15px 0;
}
#main_body form li#li_accepted_cards{
	margin-bottom: 10px;
}
#li_accepted_cards img{
	height: 27px;
}
#main_body form ul.payment_detail_form{
	margin-top: 20px
}
#main_body form li.credit_card div span{
	padding-bottom: 8px;
}
#main_body form li.credit_card div span#li_cc_span_3{
	width: 75%;
}
#main_body form li.credit_card div span#li_cc_span_4{
	width: 21%;
}
#cc_secure_icon{
	float: left;
	margin-top:5px;
}
#cc_expiry_month{
	width: 23%;
}
#cc_expiry_year{
	width: 11%;
}
#li_billing_address span.state_list,
#li_shipping_address span.state_list{
	padding-bottom: 12px !important;
}
#li_shipping_address div.shipping_address_detail{
	content: "";
    display: table;
  	clear: both;
}
#li_credit_card{
	padding-bottom: 5px !important;
	margin-bottom: 20px !important;
}
EOT;
		foreach ($form_id_array as $form_id) {
			$target_css_file = $mf_settings['data_dir']."/form_{$form_id}/css/view.css";
			if(file_exists($target_css_file) && is_writable($target_css_file)){
				file_put_contents($target_css_file, $new_css_code, FILE_APPEND);
			}
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 3.4 to 3.5 												   
	 
	 - new table ap_email_logic
	 - new table ap_email_logic_conditions
	 
	 - ap_forms: added columns  form_disabled_message, payment_enable_tax, payment_tax_rate, logic_email_enable
	 - ap_form_elements: added columns  element_number_enable_quantity, element_number_quantity_link

	 - update ap_forms records, set the value of 'form_disabled_message' to be coming from the language setting for each form.

	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	
	function do_delta_update_3_4_to_3_5($dbh,$options=array()){

		global $mf_lang;

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Create table ap_email_logic
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."email_logic` (
												    		  `form_id` int(11) NOT NULL,
															  `rule_id` int(11) NOT NULL,
															  `rule_all_any` varchar(3) NOT NULL DEFAULT 'all',
															  `target_email` text NOT NULL,
															  `template_name` varchar(15) NOT NULL DEFAULT 'notification' COMMENT 'notification - confirmation - custom',
															  `custom_from_name` text,
															  `custom_from_email` varchar(255) NOT NULL DEFAULT '',
															  `custom_subject` text,
															  `custom_content` text,
															  `custom_plain_text` int(1) NOT NULL DEFAULT '0',
															  PRIMARY KEY (`form_id`,`rule_id`)
												) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Create table ap_email_logic_conditions
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."email_logic_conditions` (
												    		  `aec_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `target_rule_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `rule_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`aec_id`),
															  KEY `form_id` (`form_id`,`target_rule_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		
		//3. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` 
														  ADD COLUMN `form_disabled_message` text,
														  ADD COLUMN `payment_enable_tax` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_tax_rate` decimal(62,2) NOT NULL DEFAULT '0.00',
														  ADD COLUMN `logic_email_enable` tinyint(1) NOT NULL DEFAULT '0';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Alter ap_form_elements table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` 
														  ADD COLUMN `element_number_enable_quantity` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_number_quantity_link` varchar(15) DEFAULT NULL;";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Update ap_forms records, set the value of 'form_disabled_message' to be coming from the language setting for each form 
		$form_language_settings = array();

		$query  = "select `form_id`,`form_language` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
	
		$i=0;
		while($row = mf_do_fetch_result($sth)){
			$form_language_settings[$i]['form_id'] = $row['form_id'];

			if(!empty($row['form_language'])){
				$form_language_settings[$i]['form_language'] = $row['form_language'];
			}else{
				$form_language_settings[$i]['form_language'] = 'english';
			}
			$i++;
		}

		if(!empty($form_language_settings)){
			foreach ($form_language_settings as $value) {
				
				mf_set_language($value['form_language']);

				$query = "UPDATE `".MF_TABLE_PREFIX."forms` SET `form_disabled_message`=? where form_id=?";
				
				$params = array($mf_lang['form_inactive'],$value['form_id']);
				$sth = $dbh->prepare($query);
				try{
					$sth->execute($params);
				}catch(PDOException $e) {
					$post_install_error .= $e->getMessage().'<br/><br/>';
				}
			}
		}
		

		

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 3.5 to 4.0.beta 												   
	 
	- new table ap_webhook_options
	- new table ap_webhook_parameters
	- new table ap_reports
	- new table ap_report_elements
	- new table ap_report_filters
	- new table ap_grid_columns

	- ap_forms: added column 'payment_enable_discount','payment_discount_type','payment_discount_amount','payment_discount_code', 'payment_discount_element_id','payment_discount_max_usage','payment_discount_expiry_date','webhook_enable'
	- ap_forms: added 'payment_authorizenet_live_apiloginid','payment_authorizenet_live_transkey','payment_authorizenet_test_apiloginid','payment_authorizenet_test_transkey','payment_authorizenet_enable_test_mode','payment_authorizenet_save_cc_data'
	- ap forms: added payment_paypal_rest_live_clientid, payment_paypal_rest_live_secret_key,payment_paypal_rest_test_clientid,payment_paypal_rest_test_secret_key,payment_paypal_rest_enable_test_mode column
	- ap_forms: added colums:
					* payment_braintree_live_merchant_id
					* payment_braintree_live_public_key
					* payment_braintree_live_private_key
					* payment_braintree_live_encryption_key

					* payment_braintree_test_merchant_id
					* payment_braintree_test_public_key
					* payment_braintree_test_private_key
					* payment_braintree_test_encryption_key

					* payment_braintree_enable_test_mode

	- ap_entries_preferences: added column 'entries_incomplete_sort_by','entries_incomplete_enable_filter','entries_incomplete_filter_type'
	- ap_form_filters: added column 'incomplete_entries'
	- ap_column_preferences: added column 'incomplete_entries'

	- add a block of new CSS code to all view.css files on all forms
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	
	function do_delta_update_3_5_to_4_0_beta($dbh,$options=array()){

		global $mf_lang;

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Create table ap_webhook_options
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."webhook_options` (
												    		  `awo_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `rule_id` int(11) NOT NULL DEFAULT '0',
															  `webhook_url` text,
															  `webhook_method` varchar(4) NOT NULL DEFAULT 'post',
															  `webhook_format` varchar(10) NOT NULL DEFAULT 'key-value',
															  `webhook_raw_data` mediumtext,
															  `enable_http_auth` int(1) DEFAULT '0',
															  `http_username` varchar(255) DEFAULT NULL,
															  `http_password` varchar(255) DEFAULT NULL,
															  `enable_custom_http_headers` int(1) NOT NULL DEFAULT '0',
															  `custom_http_headers` text,
															  PRIMARY KEY (`awo_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Create table ap_webhook_parameters
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."webhook_parameters` (
												    		  `awp_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `rule_id` int(11) NOT NULL DEFAULT '0',
															  `param_name` text,
															  `param_value` text,
															  PRIMARY KEY (`awp_id`),
															  KEY `form_id` (`form_id`,`rule_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Create table ap_reports
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."reports` (
												    		  `form_id` int(11) NOT NULL,
															  `report_access_key` varchar(100) DEFAULT NULL,
															  PRIMARY KEY (`form_id`),
															  KEY `report_access_key` (`report_access_key`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Create table ap_report_elements
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."report_elements` (
												    		  `access_key` varchar(100) DEFAULT NULL,
															  `form_id` int(11) NOT NULL,
															  `chart_id` int(11) NOT NULL,
															  `chart_position` int(11) NOT NULL DEFAULT '0',
															  `chart_status` int(1) NOT NULL DEFAULT '1',
															  `chart_datasource` varchar(25) NOT NULL DEFAULT '',
															  `chart_type` varchar(25) NOT NULL DEFAULT '',
															  `chart_enable_filter` int(1) NOT NULL DEFAULT '0',
															  `chart_filter_type` varchar(5) NOT NULL DEFAULT 'all',
															  `chart_title` text,
															  `chart_title_position` varchar(10) NOT NULL DEFAULT 'top',
															  `chart_title_align` varchar(10) NOT NULL DEFAULT 'center',
															  `chart_width` int(11) NOT NULL DEFAULT '0',
															  `chart_height` int(11) NOT NULL DEFAULT '400',
															  `chart_background` varchar(8) DEFAULT NULL,
															  `chart_theme` varchar(25) NOT NULL DEFAULT 'blueopal',
															  `chart_legend_visible` int(1) NOT NULL DEFAULT '1',
															  `chart_legend_position` varchar(10) NOT NULL DEFAULT 'right',
															  `chart_labels_visible` int(1) NOT NULL DEFAULT '1',
															  `chart_labels_position` varchar(10) NOT NULL DEFAULT 'outsideEnd',
															  `chart_labels_template` varchar(255) NOT NULL DEFAULT '#= category #',
															  `chart_labels_align` varchar(10) NOT NULL DEFAULT 'circle',
															  `chart_tooltip_visible` int(1) NOT NULL DEFAULT '1',
															  `chart_tooltip_template` varchar(255) NOT NULL DEFAULT '#= category # - #= dataItem.entry # - #= kendo.format(''{0:P}'', percentage)#',
															  `chart_gridlines_visible` int(1) NOT NULL DEFAULT '1',
															  `chart_bar_color` varchar(8) DEFAULT NULL,
															  `chart_is_stacked` int(1) NOT NULL DEFAULT '0',
															  `chart_is_vertical` int(1) NOT NULL DEFAULT '0',
															  `chart_line_style` varchar(6) NOT NULL DEFAULT 'smooth',
															  `chart_axis_is_date` int(1) NOT NULL DEFAULT '0',
															  `chart_date_range` varchar(6) NOT NULL DEFAULT 'all' COMMENT 'all,period,custom',
															  `chart_date_period_value` int(11) NOT NULL DEFAULT '1',
															  `chart_date_period_unit` varchar(5) NOT NULL DEFAULT 'day',
															  `chart_date_axis_baseunit` varchar(5) DEFAULT NULL,
															  `chart_date_range_start` date DEFAULT NULL,
															  `chart_date_range_end` date DEFAULT NULL,
															  `chart_grid_page_size` int(11) NOT NULL DEFAULT '10',
															  `chart_grid_max_length` int(11) NOT NULL DEFAULT '100',
															  PRIMARY KEY (`form_id`,`chart_id`),
															  KEY `access_key` (`access_key`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Create table ap_report_filters
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."report_filters` (
												    		  `arf_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `chart_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `filter_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `filter_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`arf_id`),
															  KEY `form_id` (`form_id`,`chart_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//6. Create table ap_grid_columns
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."grid_columns` (
												    		  `agc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `chart_id` int(11) NOT NULL,
															  `element_name` varchar(255) NOT NULL DEFAULT '',
															  `position` int(11) NOT NULL,
															  PRIMARY KEY (`agc_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}
		
		//7. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` 
														  ADD COLUMN `payment_enable_discount` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_discount_type` varchar(12) NOT NULL DEFAULT 'percent_off',
														  ADD COLUMN `payment_discount_amount` decimal(62,2) NOT NULL DEFAULT '0.00',
														  ADD COLUMN `payment_discount_code` text,
														  ADD COLUMN `payment_discount_element_id` int(11) DEFAULT NULL,
														  ADD COLUMN `payment_discount_max_usage` int(11) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_discount_expiry_date` date DEFAULT NULL,
														  ADD COLUMN `webhook_enable` tinyint(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `webhook_url` text,
														  ADD COLUMN `webhook_method` varchar(4) NOT NULL DEFAULT 'post',
														  ADD COLUMN `payment_paypal_rest_live_clientid` varchar(100) DEFAULT NULL,
														  ADD COLUMN `payment_paypal_rest_live_secret_key` varchar(100) DEFAULT NULL,
														  ADD COLUMN `payment_paypal_rest_test_clientid` varchar(100) DEFAULT NULL,
														  ADD COLUMN `payment_paypal_rest_test_secret_key` varchar(100) DEFAULT NULL,
														  ADD COLUMN `payment_paypal_rest_enable_test_mode` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_authorizenet_live_apiloginid` varchar(50) DEFAULT NULL,
														  ADD COLUMN `payment_authorizenet_live_transkey` varchar(50) DEFAULT NULL,
														  ADD COLUMN `payment_authorizenet_test_apiloginid` varchar(50) DEFAULT NULL,
														  ADD COLUMN `payment_authorizenet_test_transkey` varchar(50) DEFAULT NULL,
														  ADD COLUMN `payment_authorizenet_enable_test_mode` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_authorizenet_save_cc_data` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_braintree_live_merchant_id` varchar(50) DEFAULT NULL,
														  ADD COLUMN `payment_braintree_live_public_key` varchar(50) DEFAULT NULL,
														  ADD COLUMN `payment_braintree_live_private_key` varchar(50) DEFAULT NULL,
														  ADD COLUMN `payment_braintree_live_encryption_key` text,
														  ADD COLUMN `payment_braintree_test_merchant_id` varchar(50) DEFAULT NULL,
														  ADD COLUMN `payment_braintree_test_public_key` varchar(50) DEFAULT NULL,
														  ADD COLUMN `payment_braintree_test_private_key` varchar(50) DEFAULT NULL,
														  ADD COLUMN `payment_braintree_test_encryption_key` text,
														  ADD COLUMN `payment_braintree_enable_test_mode` int(1) NOT NULL DEFAULT '0';";
																							  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//8. Alter ap_entries_preferences table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."entries_preferences` 
														  ADD COLUMN `entries_incomplete_sort_by` varchar(100) NOT NULL DEFAULT 'id-desc',
														  ADD COLUMN `entries_incomplete_enable_filter` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `entries_incomplete_filter_type` varchar(5) NOT NULL DEFAULT 'all' COMMENT 'all or any';";
														  																				  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}
		
		//9. Alter ap_form_filters table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_filters` 
														  ADD COLUMN `incomplete_entries` int(1) NOT NULL DEFAULT '0';";
														  																				  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//10. Alter ap_column_preferences table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."column_preferences` 
														  ADD COLUMN `incomplete_entries` int(1) NOT NULL DEFAULT '0';";
														  																				  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//11. Loop through each form CSS file and add new CSS code
		$query  = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
	
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		$new_css_code = <<<EOT
#main_body form li.total_payment span.total_extra{
	clear: both; 
	margin-top: 10px; 
	text-align: right
}
#main_body form li.total_payment span.total_extra h5{
	font-weight: 700;
}
/** File Upload - HTML5 **/
.uploadifive-button {
	background-color: #505050;
	background-image: linear-gradient(bottom, #505050 0%, #707070 100%);
	background-image: -o-linear-gradient(bottom, #505050 0%, #707070 100%);
	background-image: -moz-linear-gradient(bottom, #505050 0%, #707070 100%);
	background-image: -webkit-linear-gradient(bottom, #505050 0%, #707070 100%);
	background-image: -ms-linear-gradient(bottom, #505050 0%, #707070 100%);
	background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0, #505050),
		color-stop(1, #707070)
	);
	background-position: center top;
	background-repeat: no-repeat;
	-webkit-border-radius: 30px;
	-moz-border-radius: 30px;
	border-radius: 30px;
	border: 2px solid #808080;
	color: #FFF !important;
	font: bold 12px Arial, Helvetica, sans-serif;
	text-align: center;
	text-shadow: 0 -1px 0 rgba(0,0,0,0.25);
	text-transform: uppercase;
	width: 100%;
	margin: 0 !important;
	padding: 0 !important;
}
.uploadifive-button:hover {
	background-color: #606060;
	background-image: linear-gradient(top, #606060 0%, #808080 100%);
	background-image: -o-linear-gradient(top, #606060 0%, #808080 100%);
	background-image: -moz-linear-gradient(top, #606060 0%, #808080 100%);
	background-image: -webkit-linear-gradient(top, #606060 0%, #808080 100%);
	background-image: -ms-linear-gradient(top, #606060 0%, #808080 100%);
	background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0, #606060),
		color-stop(1, #808080)
	);
	background-position: center bottom;
}
.uploadifive-queue-item {
	background-color: #F5F5F5 !important;
	border: 2px solid #E5E5E5 !important;
	font: 11px Verdana, Geneva, sans-serif;
	margin-top: 5px !important;
	padding: 10px !important;
	width: 350px;
}
.uploadifive-queue-item.error {
	background-color: #FDE5DD !important;
	border: 2px solid #FBCBBC !important;
}
.uploadifive-queue-item .close {
	background: url('../../../images/icons/delete.png') 0 0 no-repeat;
	display: block;
	float: right;
	height: 16px;
	text-indent: -9999px;
	width: 16px;
}
.uploadifive-queue-item .progress {
	border: 1px solid #D0D0D0;
	height: 3px;
	margin: 8px 0 0 0 !important;
	width: 100%;
	padding: 0 !important;
	clear: both;
}
.uploadifive-queue-item .progress-bar {
	background-color: #0099FF;
	height: 3px;
	width: 0;
	padding: 0 !important;
}
.uploadifive-queue-item div{
	overflow: auto;
	padding-bottom: 0 !important;
}
.uploadifive-queue-item span{
	width: auto !important;
}
.uploadifive-queue-item span.fileinfo{
	margin-left: 5px !important;
}
EOT;
		foreach ($form_id_array as $form_id) {
			$target_css_file = $mf_settings['data_dir']."/form_{$form_id}/css/view.css";
			if(file_exists($target_css_file) && is_writable($target_css_file)){
				file_put_contents($target_css_file, $new_css_code, FILE_APPEND);
			}
		}
		


		return $post_install_error;
	}

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_4_0_beta_to_4_0($dbh,$options=array()){
		//there is no changes between 4.0.beta to 4.0
		//only the version number need to be changed

		return '';
	}

	/***************************************************************************
	 Changelog 4.0 to 4.1 												   
	 
	 - ap_forms: added column 'esl_replyto_email_address','esr_replyto_email_address'
	 - ap_email_logic: added column 'custom_replyto_email'
	 
	1) Loop through each form
	..copy value from 'esl_from_email_address' to 'esl_replyto_email_address'
	..check into 'esl_from_email_address' field 
	....if the field doesn't contain email address, replace it with the Default From Email

	..copy value from 'esr_from_email_address' to 'esr_replyto_email_address'
	..check into 'esr_from_email_address' field 
	....if the field doesn't contain email address, replace it with the Default From Email

	2) Loop through each record within ap_email_logic table
    ..copy value from 'custom_from_email' to 'custom_replyto_email'
    ..check into 'custom_from_email' field
    ....if the field doesn't contain email address, replace it with the Default From Email
	 
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	
	function do_delta_update_4_0_to_4_1($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` 
														  ADD COLUMN `esl_replyto_email_address` varchar(255) DEFAULT NULL,
														  ADD COLUMN `esr_replyto_email_address` varchar(255) DEFAULT NULL;";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Alter ap_email_logic table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."email_logic` ADD COLUMN `custom_replyto_email` varchar(255) NOT NULL DEFAULT '';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Update ap_forms table 
		//   Copy value from 'esl_from_email_address' to 'esl_replyto_email_address'
		//   Copy value from 'esr_from_email_address' to 'esr_replyto_email_address'
		$query = "UPDATE ".MF_TABLE_PREFIX."forms set esl_replyto_email_address=esl_from_email_address,esr_replyto_email_address=esr_from_email_address";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Update ap_email_logic table
		//   Copy value from 'custom_from_email' to 'custom_replyto_email'
		$query = "update ".MF_TABLE_PREFIX."email_logic set custom_replyto_email=custom_from_email";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Loop through each record within ap_forms table 
		$query  = "select `form_id`,`esl_from_email_address`,`esr_from_email_address` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
		
		$form_email_data = array();
		$i=0;
		while($row = mf_do_fetch_result($sth)){
			$form_email_data[$i]['form_id'] = $row['form_id'];
			$form_email_data[$i]['esl_from_email_address'] = $row['esl_from_email_address'];
			$form_email_data[$i]['esr_from_email_address'] = $row['esr_from_email_address'];
			$i++;
		}

		if(!empty($form_email_data)){
			$default_from_email = $mf_settings['default_from_email'];

			foreach ($form_email_data as $value) {
				$form_id = $value['form_id'];

				$query = '';
				if((strpos($value['esl_from_email_address'], '@') === false) && (strpos($value['esr_from_email_address'], '@') === false)){
					$query = "UPDATE ".MF_TABLE_PREFIX."forms set esl_from_email_address = ?,esr_from_email_address = ? where form_id = ?";
					$params = array($default_from_email,$default_from_email,$form_id);
				}else if(strpos($value['esl_from_email_address'], '@') === false){
					$query = "UPDATE ".MF_TABLE_PREFIX."forms set esl_from_email_address = ? where form_id = ?";
					$params = array($default_from_email,$form_id);
				}else if(strpos($value['esr_from_email_address'], '@') === false){
					$query = "UPDATE ".MF_TABLE_PREFIX."forms set esr_from_email_address = ? where form_id = ?";
					$params = array($default_from_email,$form_id);
				}

				if(!empty($query)){
					$sth = $dbh->prepare($query);
					try{
						$sth->execute($params);
					}catch(PDOException $e) {
						$post_install_error .= $e->getMessage().'<br/><br/>';
					}
				}

			}
		}

		//6. Loop through each record within ap_email_logic table
		//check into custom_from_email_address field
		//if the field doesn't contain email address, replace it with the Default From Email
		$query  = "select `form_id`,`rule_id`,`custom_from_email` from ".MF_TABLE_PREFIX."email_logic";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
		
		$form_email_logic_data = array();
		$i=0;
		while($row = mf_do_fetch_result($sth)){
			$form_email_logic_data[$i]['form_id'] = $row['form_id'];
			$form_email_logic_data[$i]['rule_id'] = $row['rule_id'];
			$form_email_logic_data[$i]['custom_from_email'] = $row['custom_from_email'];
			$i++;
		}

		if(!empty($form_email_logic_data)){
			$default_from_email = $mf_settings['default_from_email'];

			foreach ($form_email_logic_data as $value) {
				$form_id = $value['form_id'];
				$rule_id = $value['rule_id'];

				if(strpos($value['custom_from_email'], '@') === false){
					$query = "UPDATE ".MF_TABLE_PREFIX."email_logic set custom_from_email = ? where form_id = ? and rule_id = ?";
					$params = array($default_from_email,$form_id,$rule_id);

					$sth = $dbh->prepare($query);
					try{
						$sth->execute($params);
					}catch(PDOException $e) {
						$post_install_error .= $e->getMessage().'<br/><br/>';
					}
				}

			}
		}
		

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 4.1 to 4.2 												   
	 - create new table: ap_webhook_logic_conditions
	 
	 - ap_settings: added column 'enforce_tsv','enable_ip_restriction','ip_whitelist','enable_account_locking',
	 				'account_lock_period','account_lock_max_attempts','default_form_theme_id'
	 - ap_users: added column 'tsv_enable','tsv_secret','tsv_code_log','login_attempt_date','login_attempt_count'
	 - ap_forms: added column 'logic_webhook_enable','form_custom_script_enable','form_custom_script_url'
	 - ap_webhook_options: added column 'rule_all_any'
	 
	 - loop through each form: update 'session_id' length on all ap_form_x_review tables. Set the length to 128 instead of 100.
	 
	 - run these queries:
			ALTER TABLE `ap_field_logic_conditions` ADD INDEX (`form_id`,`target_element_id`);
			ALTER TABLE `ap_email_logic_conditions` ADD INDEX (`form_id`,`target_rule_id`);
			ALTER TABLE `ap_page_logic_conditions` ADD INDEX (`form_id`,`target_page_id`);
			update ap_form_themes set field_bg_color='#FBFBFB' where field_bg_color = '#ffffff' and theme_id <= 22;
			update ap_form_themes set border_form_width=0 where border_form_width=1 and theme_id <= 22;
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	
	function do_delta_update_4_1_to_4_2($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Create table ap_webhook_logic_conditions
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."webhook_logic_conditions` (
												    		  `wlc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `target_rule_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `rule_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`wlc_id`),
															  KEY `form_id` (`form_id`,`target_rule_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Alter ap_settings table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."settings` 
														  ADD COLUMN `enforce_tsv` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `enable_ip_restriction` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `ip_whitelist` text,
														  ADD COLUMN `enable_account_locking` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `account_lock_period` int(11) NOT NULL DEFAULT '30',
														  ADD COLUMN `account_lock_max_attempts` int(11) NOT NULL DEFAULT '6',
														  ADD COLUMN `default_form_theme_id` int(11) NOT NULL DEFAULT '0';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Alter ap_users table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."users` 
														  ADD COLUMN `tsv_enable` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `tsv_secret` varchar(16) DEFAULT NULL,
														  ADD COLUMN `tsv_code_log` varchar(100) DEFAULT NULL,
														  ADD COLUMN `login_attempt_date` datetime DEFAULT NULL,
														  ADD COLUMN `login_attempt_count` int(11) NOT NULL DEFAULT '0';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` 
														  ADD COLUMN `logic_webhook_enable` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `form_custom_script_enable` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `form_custom_script_url` text;";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Alter ap_webhook_options table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."webhook_options` 
														  ADD COLUMN `rule_all_any` varchar(3) NOT NULL DEFAULT 'all';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//6. Update 'session_id' length on all ap_form_x_review tables. Set the length to 128 instead of 100. 
		$query = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
				
		$form_id_array = array();
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}
				
		foreach ($form_id_array as $form_id) {
			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}_review` CHANGE `session_id` `session_id` VARCHAR(128) NULL;";
			
			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				//do nothing, ignore if table review not exist
			}
		}

		//7. Run several UPDATE queries
		$misc_update_query_array = array();

		$misc_update_query_array[] = "ALTER TABLE `".MF_TABLE_PREFIX."field_logic_conditions` ADD INDEX (`form_id`,`target_element_id`)";
		$misc_update_query_array[] = "ALTER TABLE `".MF_TABLE_PREFIX."email_logic_conditions` ADD INDEX (`form_id`,`target_rule_id`)";
		$misc_update_query_array[] = "ALTER TABLE `".MF_TABLE_PREFIX."page_logic_conditions` ADD INDEX (`form_id`,`target_page_id`)";
		$misc_update_query_array[] = "UPDATE ".MF_TABLE_PREFIX."form_themes SET field_bg_color='#FBFBFB' WHERE field_bg_color = '#ffffff' and theme_id <= 22";
		$misc_update_query_array[] = "UPDATE ".MF_TABLE_PREFIX."form_themes SET border_form_width=0 WHERE border_form_width=1 and theme_id <= 22";
		
		foreach ($misc_update_query_array as $query) {
			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				$post_install_error .= $e->getMessage().'<br/><br/>';
			}
		}

		return $post_install_error;
	}

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_4_2_to_4_2_3($dbh,$options=array()){
		//there is no database changes between 4.2 to 4.2.3
		//only the version number need to be changed

		return '';
	}

	/***************************************************************************
	 Changelog 4.2.3 to 4.3 												   
	 - ap_settings: added column 'recaptcha_site_key','recaptcha_secret_key','ldap_enable','ldap_type','ldap_host','ldap_port','ldap_encryption','ldap_basedn','ldap_account_suffix','ldap_required_group','ldap_exclusive'
	  
	 - run these queries:
			ALTER TABLE `ap_form_payments` ADD INDEX (`form_id`,`record_id`);
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	
	function do_delta_update_4_2_3_to_4_3($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_settings table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."settings` 
														  ADD COLUMN `recaptcha_site_key` varchar(255) DEFAULT NULL,
														  ADD COLUMN `recaptcha_secret_key` varchar(255) DEFAULT NULL,
														  ADD COLUMN `ldap_enable` tinyint(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `ldap_type` varchar(11) NOT NULL DEFAULT 'ad' COMMENT 'ad,openldap',
														  ADD COLUMN `ldap_host` varchar(255) DEFAULT NULL,
														  ADD COLUMN `ldap_port` int(11) NOT NULL DEFAULT '389',
														  ADD COLUMN `ldap_encryption` varchar(11) NOT NULL DEFAULT 'none' COMMENT 'none,ssl,tls',
														  ADD COLUMN `ldap_basedn` varchar(255) DEFAULT NULL,
														  ADD COLUMN `ldap_account_suffix` varchar(100) DEFAULT NULL,
														  ADD COLUMN `ldap_required_group` varchar(255) DEFAULT NULL,
														  ADD COLUMN `ldap_exclusive` tinyint(1) NOT NULL DEFAULT '0';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Run several UPDATE queries
		$misc_update_query_array = array();

		$misc_update_query_array[] = "ALTER TABLE `".MF_TABLE_PREFIX."form_payments` ADD INDEX (`form_id`,`record_id`)";
		
		foreach ($misc_update_query_array as $query) {
			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				$post_install_error .= $e->getMessage().'<br/><br/>';
			}
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 4.3 to 4.4 												   
	 - ap_forms: added columns 'esl_pdf_enable','esl_pdf_content','esr_pdf_enable','esr_pdf_content','form_name_hide','form_unique_ip_maxcount','form_unique_ip_period'
	 - ap_email_logic: added columns 'custom_pdf_enable', 'custom_pdf_content','delay_notification_until_paid'
	 - ap_webhook_options: added columns 'delay_notification_until_paid'
	 - ap_form_elements: added columns 'element_is_readonly','element_choice_limit_rule','element_choice_limit_qty',
									  'element_choice_limit_range_min','element_choice_limit_range_max','element_enable_placeholder',
									  'element_choice_max_entry'
	 - ap_report_elements: added columns 'chart_grid_sort_by'

	 run this query to all ap_form_XX tables:
	 --------
	 ALTER TABLE `ap_form_XXXX` ADD INDEX (`ip_address`);
	 ALTER TABLE `ap_form_XXXX` ADD INDEX (`date_created`);

	 run this single query:
	 ----------------
	 1) update ap_forms set payment_enable_merchant = 0 where payment_enable_merchant = -1
	 2) ALTER TABLE `ap_forms` CHANGE `payment_enable_merchant` `payment_enable_merchant` INT(1)  NOT NULL  DEFAULT '0';

	 tasks:
	 ------
	 loop through each "form_unique_ip" records, if the value is 1, set 'form_unique_ip_period' to 'l' (lifetime) and set 'form_unique_ip_maxcount' to 1

	 Add the following CSS code to all view.css files:
	--------
	#main_body form li div span.label
	{
		clear:both;
		color:#444;
		display:block;
		font-size:85%;
		line-height:15px;
		margin:0;
		padding-top:3px;
	}

	#main_body form li div span.label var
	{
		font-style: normal;
		font-weight: bold;
	}
	#main_body span.description
	{
		border:none;
		color:#444;
		display:block;
		font-size:95%;
		font-weight:700;
		line-height:150%;
		padding:0 0 1px;
		float: none;
	}

	#main_body form.left_label span.description{
		float: left;
		margin: 0 15px 0 0;
		width: 29%;
	}

	#main_body form.right_label span.description{
		float: left;
		margin: 0 15px 0 0;
		width: 29%;
		text-align: right;
	}
	.no_guidelines form.left_label span.description,
	.no_guidelines form.right_label span.description{
		width: 30% !important;
	}
	#main_body form li fieldset{
		margin: 0;
		padding:0;
		border: none;
	}
	--------
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	
	function do_delta_update_4_3_to_4_4($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` 
														  ADD COLUMN `esl_pdf_enable` tinyint(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `esl_pdf_content` mediumtext,
														  ADD COLUMN `esr_pdf_enable` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `esr_pdf_content` mediumtext,
														  ADD COLUMN `form_name_hide` tinyint(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `form_unique_ip_maxcount` int(11) NOT NULL DEFAULT '5',
														  ADD COLUMN `form_unique_ip_period` char(1) NOT NULL DEFAULT 'd' COMMENT 'h,d,w,m,y,l (hour/day/week/month/year/lifetime)';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Alter ap_email_logic table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."email_logic` 
														  ADD COLUMN `custom_pdf_enable` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `custom_pdf_content` text,
														  ADD COLUMN `delay_notification_until_paid` int(1) NOT NULL DEFAULT '0';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Alter ap_webhook_options table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."webhook_options` 
														  ADD COLUMN `delay_notification_until_paid` int(1) NOT NULL DEFAULT '0';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Alter ap_form_elements table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` 
														  ADD COLUMN `element_is_readonly` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_choice_limit_rule` varchar(12) NOT NULL DEFAULT 'atleast',
														  ADD COLUMN `element_choice_limit_qty` int(11) NOT NULL DEFAULT '1',
														  ADD COLUMN `element_choice_limit_range_min` int(11) NOT NULL DEFAULT '1',
														  ADD COLUMN `element_choice_limit_range_max` int(11) NOT NULL DEFAULT '1',
														  ADD COLUMN `element_enable_placeholder` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_choice_max_entry` int(11) NOT NULL DEFAULT '0';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Alter ap_report_elements table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."report_elements` 
														  ADD COLUMN `chart_grid_sort_by` varchar(100) NOT NULL DEFAULT 'id-desc';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//6. Add indexes (ip_address, date_created) on all ap_form_x tables
		$query = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
				
		$form_id_array = array();
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}
				
		foreach ($form_id_array as $form_id) {
			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}` ADD INDEX (`ip_address`);";
			
			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				//do nothing, ignore if table review not exist
			}
		}

		foreach ($form_id_array as $form_id) {
			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}` ADD INDEX (`date_created`);";
			
			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				//do nothing, ignore if table review not exist
			}
		}

		//7. Run several UPDATE queries
		$misc_update_query_array = array();

		$misc_update_query_array[] = "UPDATE ".MF_TABLE_PREFIX."forms set payment_enable_merchant = 0 WHERE payment_enable_merchant = -1";
		$misc_update_query_array[] = "UPDATE ".MF_TABLE_PREFIX."forms set form_unique_ip_period = 'l',form_unique_ip_maxcount = 1 WHERE form_unique_ip = 1";
		$misc_update_query_array[] = "ALTER TABLE `".MF_TABLE_PREFIX."forms` CHANGE `payment_enable_merchant` `payment_enable_merchant` INT(1)  NOT NULL  DEFAULT '0'";
		
		foreach ($misc_update_query_array as $query) {
			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				$post_install_error .= $e->getMessage().'<br/><br/>';
			}
		}
		
		//8. Loop through each view.css file and add new code
		$new_css_code = <<<EOT
#main_body form li div span.label
{
	clear:both;
	color:#444;
	display:block;
	font-size:85%;
	line-height:15px;
	margin:0;
	padding-top:3px;
}

#main_body form li div span.label var
{
	font-style: normal;
	font-weight: bold;
}
#main_body span.description
{
	border:none;
	color:#444;
	display:block;
	font-size:95%;
	font-weight:700;
	line-height:150%;
	padding:0 0 1px;
	float: none;
}

#main_body form.left_label span.description{
	float: left;
	margin: 0 15px 0 0;
	width: 29%;
}

#main_body form.right_label span.description{
	float: left;
	margin: 0 15px 0 0;
	width: 29%;
	text-align: right;
}
.no_guidelines form.left_label span.description,
.no_guidelines form.right_label span.description{
	width: 30% !important;
}
#main_body form li fieldset{
	margin: 0;
	padding:0;
	border: none;
}
EOT;
		foreach ($form_id_array as $form_id) {
			$target_css_file = $mf_settings['data_dir']."/form_{$form_id}/css/view.css";
			if(file_exists($target_css_file) && is_writable($target_css_file)){
				file_put_contents($target_css_file, $new_css_code, FILE_APPEND);
			}
		}

		return $post_install_error;
	}

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_4_4_to_4_5($dbh,$options=array()){
		//there is no database structure changes between 4.4 to 4.5
		//only the version number need to be changed

		return '';
	}

	/***************************************************************************
	 Changelog 4.5 to 4.6

	 new tables:
		- ap_success_logic_conditions
		- ap_success_logic_options
	
	 modified tables:
		- ap_forms: added columns 'payment_enable_setupfee','payment_setupfee_amount','logic_success_enable','esl_bcc_email_address',
								  'esr_bcc_email_address','form_resume_subject','form_resume_content','form_resume_from_name',
								  'form_resume_from_email_address'
		- ap_email_logic: added columns 'custom_bcc'
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	
	function do_delta_update_4_5_to_4_6($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Create table ap_success_logic_conditions
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."success_logic_conditions` (
												    		  `slc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `target_rule_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `rule_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`slc_id`),
															  KEY `form_id` (`form_id`,`target_rule_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Create table ap_success_logic_options
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."success_logic_options` (
												    		  `slo_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `rule_id` int(11) NOT NULL DEFAULT '0',
															  `rule_all_any` varchar(3) NOT NULL DEFAULT 'all',
															  `success_type` varchar(11) NOT NULL DEFAULT 'message' COMMENT 'message;redirect',
															  `success_message` text,
															  `redirect_url` text,
															  PRIMARY KEY (`slo_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		
		//3. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` 
														  ADD COLUMN `payment_enable_setupfee` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_setupfee_amount` decimal(62,2) NOT NULL DEFAULT '0.00',
														  ADD COLUMN `logic_success_enable` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `esl_bcc_email_address` text,
														  ADD COLUMN `esr_bcc_email_address` text,
														  ADD COLUMN `form_resume_subject` text,
														  ADD COLUMN `form_resume_content` mediumtext,
														  ADD COLUMN `form_resume_from_name` text,
														  ADD COLUMN `form_resume_from_email_address` varchar(255) DEFAULT '';";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Alter ap_email_logic table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."email_logic` ADD COLUMN `custom_bcc` text";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}


		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 4.6 to 4.7

	 modified tables:
		- ap_forms: added columns 'payment_stripe_enable_receipt','payment_stripe_receipt_element_id'
		- ap_permissions: added columns 'edit_report'
		- ap_form_elements: added columns 'element_text_default_type','element_text_default_length','element_text_default_random_type',
								  'element_text_default_prefix','element_text_default_case'

	 run this single query:
	 ---------------- 
	 update ap_permissions set edit_report = edit_form;
	
	 add the following CSS code to all view.css files:
	 ---------
	 #main_body form.left_label li div.mf_sig_wrapper, #main_body form.right_label li div.mf_sig_wrapper
	 {
		float: left;
		width: 309px;
	 }
	 #main_body form.left_label li .mf_sigpad_clear, #main_body form.right_label li .mf_sigpad_clear
	 {
		float: left;
	 }
	 ---------
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	
	function do_delta_update_4_6_to_4_7($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` 
														  ADD COLUMN `payment_stripe_enable_receipt` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `payment_stripe_receipt_element_id` int(11) DEFAULT NULL;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Alter ap_permissions table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."permissions` ADD COLUMN `edit_report` tinyint(1) NOT NULL DEFAULT '0'";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Alter ap_form_elements table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` 
														  ADD COLUMN `element_text_default_type` varchar(6) NOT NULL DEFAULT 'static',
														  ADD COLUMN `element_text_default_length` int(11) NOT NULL DEFAULT '10',
														  ADD COLUMN `element_text_default_random_type` varchar(8) NOT NULL DEFAULT 'letter',
														  ADD COLUMN `element_text_default_prefix` varchar(50) DEFAULT NULL,
														  ADD COLUMN `element_text_default_case` char(1) NOT NULL DEFAULT 'u';";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. run single query to update ap_permissions
		$query = "UPDATE ".MF_TABLE_PREFIX."permissions SET edit_report = edit_form;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Loop through the view.css file of each form and add new code
		$query = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
				
		$form_id_array = array();
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		$new_css_code = <<<EOT
#main_body form.left_label li div.mf_sig_wrapper, #main_body form.right_label li div.mf_sig_wrapper
{
	float: left;
	width: 309px;
}
#main_body form.left_label li .mf_sigpad_clear, #main_body form.right_label li .mf_sigpad_clear
{
	float: left;
}
EOT;
		foreach ($form_id_array as $form_id) {
			$target_css_file = $mf_settings['data_dir']."/form_{$form_id}/css/view.css";
			if(file_exists($target_css_file) && is_writable($target_css_file)){
				file_put_contents($target_css_file, $new_css_code, FILE_APPEND);
			}
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 4.7 to 4.8

	 modified tables:
	 -----------
	 - ap_settings: added column 'timezone'
	 - ap_users: added column 'reset_hash','reset_date'

	 new tables:
	 -----------
	 - ap_form_themes_files

	 add the following CSS code to all view.css files:
	 ---------
	 #main_body form li.error span.description
	 {
		color:#DF0000 !important;
	 }
	 ---------
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	
	function do_delta_update_4_7_to_4_8($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_settings table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."settings` ADD COLUMN `timezone` varchar(100) DEFAULT NULL;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Alter ap_users table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."users` 
														  ADD COLUMN `reset_hash` varchar(100) DEFAULT NULL,
														  ADD COLUMN `reset_date` datetime DEFAULT NULL;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Create table ap_form_themes_files
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_themes_files` (
													  		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `file_name` text NOT NULL,
															  `file_content` longblob,
															  PRIMARY KEY (`id`),
															  KEY `file_name` (`file_name`(255))
													) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Loop through the view.css file of each form and add new code
		$query = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
				
		$form_id_array = array();
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		$new_css_code = <<<EOT
#main_body form li.error span.description
{
	color:#DF0000 !important;
}
EOT;
		foreach ($form_id_array as $form_id) {
			$target_css_file = $mf_settings['data_dir']."/form_{$form_id}/css/view.css";
			if(file_exists($target_css_file) && is_writable($target_css_file)){
				file_put_contents($target_css_file, $new_css_code, FILE_APPEND);
			}
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 4.8 to 5

	 modified tables:
	 -----------
	 - ap_forms: added column 'form_approval_enable','form_created_date','form_created_by'

	 new tables:
	 -----------
	 - ap_approval_settings
	 - ap_approvers
	 - ap_approvers_conditions
	 - ap_dashboard_filters

	 do the following:
	 ---------
	 check into ap_permissions table, make sure to fill the 'form_created_date' & 'form_created_by' 
	 on ap_forms with values from the ap_permissions table
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	
	function do_delta_update_4_8_to_5($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` ADD COLUMN `form_approval_enable` tinyint(1) NOT NULL DEFAULT '0',
														 ADD COLUMN `form_created_date` date DEFAULT NULL,
														 ADD COLUMN `form_created_by` int(11) DEFAULT NULL;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Create table ap_approval_settings
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."approval_settings` (
												    		  `form_id` int(11) NOT NULL,
															  `workflow_type` varchar(11) NOT NULL DEFAULT 'parallel' COMMENT 'parallel,serial',
															  `parallel_workflow` varchar(11) NOT NULL DEFAULT 'any' COMMENT 'any,all',
															  `revision_no` int(11) NOT NULL,
															  `revision_date` datetime default NULL,
															  `last_revised_by` int(11) NOT NULL,
															  PRIMARY KEY (`form_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Create table ap_approvers
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."approvers` (
												    		  `form_id` int(11) NOT NULL,
															  `user_id` int(11) NOT NULL,
															  `rule_all_any` varchar(3) NOT NULL DEFAULT 'all' COMMENT 'all,any',
															  `user_position` int(11) NOT NULL,
															  PRIMARY KEY (`form_id`,`user_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Create table ap_approvers_conditions
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."approvers_conditions` (
												    		  `aac_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `target_user_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `rule_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`aac_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Create table ap_dashboard_filters
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."dashboard_filters` (
												    		  `adf_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `user_id` int(11) NOT NULL,
															  `filter_id` int(11) NOT NULL,
															  `filter_name` varchar(255) NOT NULL DEFAULT '',
															  `filter_active` tinyint(1) NOT NULL DEFAULT '0',
															  `filter_by` varchar(5) NOT NULL DEFAULT 'title',
															  `filter_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`adf_id`)
															) DEFAULT CHARACTER SET utf8;";
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//6. check into ap_permissions table, make sure to fill the 'form_created_by' 
	 	//   on ap_forms with values from the ap_permissions table (this is just best-effort attempt)
		$query = "select form_id,min(user_id) user_id from ".MF_TABLE_PREFIX."permissions where edit_form=1 group by form_id";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
				
		$form_perms_array = array();
		$i=0;
		while($row = mf_do_fetch_result($sth)){
			$form_perms_array[$i]['form_id'] = $row['form_id'];
			$form_perms_array[$i]['user_id'] = $row['user_id'];
			$i++;
		}

		//update ap_forms
		foreach ($form_perms_array as $value) {
			$query = "update ".MF_TABLE_PREFIX."forms set form_created_by=? where form_id=?";
			$params = array($value['user_id'],$value['form_id']);

			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				$post_install_error .= $e->getMessage().'<br/><br/>';
			}
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 5 to 6
	
	 modified tables:
	 -----------------
	 - ap_form_elements: added column 'element_email_enable_confirmation','element_email_confirm_field_label',
									 'element_date_disable_dayofweek','element_date_disabled_dayofweek_list',
									 'element_is_encrypted'
	 - ap_forms: added column 'form_encryption_enable','form_encryption_public_key'

	 do the following:
	 -----------------
	 - check all 'element_date_disable_weekend' value, if enabled make sure to enable 'element_date_disable_dayofweek' 
	 and set the value of 'element_date_disable_dayofweek_list' with weekends days	
	 - remove 'element_date_disable_weekend' column from ap_form_elements table
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_5_to_6($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` ADD COLUMN `form_encryption_enable` tinyint(1) NOT NULL DEFAULT '0',
														 ADD COLUMN `form_encryption_public_key` text;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Alter ap_form_elements table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` 
														  ADD COLUMN `element_email_enable_confirmation` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_email_confirm_field_label` varchar(255) DEFAULT NULL,
														  ADD COLUMN `element_date_disable_dayofweek` int(1) NOT NULL DEFAULT '0',
														  ADD COLUMN `element_date_disabled_dayofweek_list` varchar(15) DEFAULT NULL,
														  ADD COLUMN `element_is_encrypted` int(1) NOT NULL DEFAULT '0';";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. check all 'element_date_disable_weekend' value, if enabled make sure to enable 'element_date_disable_dayofweek' 
	 	//   and set the value of 'element_date_disable_dayofweek_list' with weekends days	
	 	//   -> element_date_disable_dayofweek=1
		//   -> element_date_disabled_dayofweek_list=0,6
		$query = "UPDATE 
						`".MF_TABLE_PREFIX."form_elements` 
					 SET 
					 	element_date_disable_dayofweek=1,
					 	element_date_disabled_dayofweek_list='0,6' 
				   WHERE 
				   		element_type in('date','europe_date') AND 
				   		element_date_disable_weekend=1;";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. remove 'element_date_disable_weekend' column from ap_form_elements table
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` DROP COLUMN `element_date_disable_weekend`;";
														  
		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 6 to 6.1
	
	 modified tables:
	 -----------------
	 - ap_element_options: added column 'option_is_hidden'
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_6_to_6_1($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter element_options table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."element_options` ADD COLUMN `option_is_hidden` int(11) NOT NULL DEFAULT '0';";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 6.1 to 7
	
	 modified tables:
	 -----------------
	 - ap_form_elements: added columns 'element_media_type','element_media_image_src','element_media_image_width','element_media_image_height',
	 								   'element_media_image_alignment','element_media_image_alt','element_media_image_href',
	 								   'element_media_display_in_email','element_media_video_src','element_media_video_size',
	 								   'element_media_video_muted','element_media_video_caption_file'

	 - ap_forms: added columns 'payment_authorizenet_enable_email','payment_authorizenet_email_element_id'

	 new tables:
	 ------------
	 - ap_form_images_files

	 others:
	 -------
	 replace all view.css files and keep backup of the old view.css file as view.old.css
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_6_1_to_7($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_form_elements table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` 
														    ADD COLUMN `element_media_type` varchar(8) NOT NULL DEFAULT 'image',
															ADD COLUMN `element_media_image_src` text,
															ADD COLUMN `element_media_image_width` int(11) DEFAULT NULL,
															ADD COLUMN `element_media_image_height` int(11) DEFAULT NULL,
															ADD COLUMN `element_media_image_alignment` char(1) NOT NULL DEFAULT 'l',
															ADD COLUMN `element_media_image_alt` text,
															ADD COLUMN `element_media_image_href` text,
															ADD COLUMN `element_media_display_in_email` int(1) NOT NULL DEFAULT '0',
															ADD COLUMN `element_media_video_src` text,
															ADD COLUMN `element_media_video_size` varchar(6) NOT NULL DEFAULT 'large',
															ADD COLUMN `element_media_video_muted` int(1) NOT NULL DEFAULT '0',
															ADD COLUMN `element_media_video_caption_file` text;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` 
														ADD COLUMN `payment_authorizenet_enable_email` int(1) NOT NULL DEFAULT '0',
  														ADD COLUMN `payment_authorizenet_email_element_id` int(11) DEFAULT NULL;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Create ap_form_images_files table
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_images_files` (
													    		  `form_id` int(11) NOT NULL,
																  `file_name` text NOT NULL,
																  `file_content` longblob,
																  KEY `form_id` (`form_id`,`file_name`(100))
															) DEFAULT CHARACTER SET utf8;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Replace all view.css file with the new one and keep backup of the old file
		$query  = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
	
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		foreach ($form_id_array as $form_id) {
			$target_css_file 		= $mf_settings['data_dir']."/form_{$form_id}/css/view.css";
			$target_css_file_backup = $mf_settings['data_dir']."/form_{$form_id}/css/view.old.css";

			if(file_exists($target_css_file)){
				rename($target_css_file, $target_css_file_backup);

				$old_mask = umask(0);
				copy("./view.css",$mf_settings['data_dir']."/form_{$form_id}/css/view.css");
				umask($old_mask);
			}
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 7 to 8
	
	 modified tables:
	 -----------------
	 - ap_forms: added column 'payment_stripe_enable_payment_request_button','payment_stripe_account_country'

	 - run this query on upgrade.php (bugfix with recaptcha2 being deprecated):  
			UPDATE ap_forms SET form_captcha_type = 'n' WHERE form_captcha_type = 'r';

	 - add the following CSS code to all view.css files:
	 ----
	 #main_body form li.hide_cents .sub_currency{
	 	display: none;
	 }
	 #main_body form ul.payment_detail_form li span.description{
	 	margin-bottom: 5px;
	 }
	 #stripe-card-element {
	 	border: 4px solid #EFEFEF;
	 	border-radius: 8px;
	 	box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.2) inset;
	 	outline: medium none;
	 	background: none repeat scroll 0 0 #FBFBFB;
	 	padding: 0 0 0 5px !important;
	 	color:#666666;
	 	font-size:100%;
	 	margin-bottom:15px !important;
	 	width: 75%;
	 }
	 #main_body form li.media{
	 	width: 97% !important;
	 }
	 ----

	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_7_to_8($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` 
														ADD COLUMN `payment_stripe_enable_payment_request_button` int(1) NOT NULL DEFAULT '0',
  														ADD COLUMN `payment_stripe_account_country` varchar(2) DEFAULT NULL;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Run query to update ap_forms captcha
		$query = "UPDATE ".MF_TABLE_PREFIX."forms SET form_captcha_type = 'n' WHERE form_captcha_type = 'r'";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Loop through the view.css file of each form and add new code
		$query = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
				
		$form_id_array = array();
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		$new_css_code = <<<EOT
#main_body form li.hide_cents .sub_currency{
	display: none;
}
#main_body form ul.payment_detail_form li span.description{
	margin-bottom: 5px;
}
#stripe-card-element {
	border: 4px solid #EFEFEF;
	border-radius: 8px;
	box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.2) inset;
	outline: medium none;
	background: none repeat scroll 0 0 #FBFBFB;
	padding: 0 0 0 5px !important;
	color:#666666;
	font-size:100%;
	margin-bottom:15px !important;
	width: 75%;
}
#main_body form li.media{
	width: 97% !important;
}
EOT;
		foreach ($form_id_array as $form_id) {
			$target_css_file = $mf_settings['data_dir']."/form_{$form_id}/css/view.css";
			if(file_exists($target_css_file) && is_writable($target_css_file)){
				file_put_contents($target_css_file, $new_css_code, FILE_APPEND);
			}
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 8 to 9
	
	 modified tables:
	 -----------------
	 - ap_settings: added column 'enable_data_retention','data_retention_period'
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_8_to_9($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_settings table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."settings` 
														ADD COLUMN `enable_data_retention` tinyint(1) NOT NULL DEFAULT '0',
  														ADD COLUMN `data_retention_period` int(11) NOT NULL DEFAULT '38' COMMENT 'months';";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 9 to 10

	 new table:
	 -----------------
	 - ap_integrations
	
	 modified tables:
	 -----------------
	 - ap_settings: added column 'googleapi_clientid','googleapi_clientsecret'

	 Minimum PHP version changed to PHP 5.4
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_9_to_10($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Create ap_integrations table
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."integrations` (
												    		  `ai_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `form_id` int(11) NOT NULL,
															  `gsheet_integration_status` tinyint(1) NOT NULL DEFAULT '0',
															  `gsheet_spreadsheet_id` varchar(255) DEFAULT NULL,
															  `gsheet_spreadsheet_url` text,
															  `gsheet_elements` text,
															  `gsheet_create_new_sheet` tinyint(1) NOT NULL DEFAULT '0',
															  `gsheet_refresh_token` varchar(255) DEFAULT NULL,
															  `gsheet_access_token` varchar(255) DEFAULT NULL,
															  `gsheet_token_create_date` datetime DEFAULT NULL,
															  `gsheet_linked_user_id` int(11) DEFAULT NULL,
															  `gsheet_delay_notification_until_paid` tinyint(1) NOT NULL DEFAULT '1',
															  `gsheet_delay_notification_until_approved` tinyint(1) NOT NULL DEFAULT '1',
															  PRIMARY KEY (`ai_id`)
															) DEFAULT CHARACTER SET utf8;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Alter ap_settings table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."settings` 
														ADD COLUMN `googleapi_clientid` varchar(255) DEFAULT NULL,
  														ADD COLUMN `googleapi_clientsecret` varchar(255) DEFAULT NULL;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 10 to 11

	 modified tables:
	 -----------------
	 - ap_integrations : all 'gcal_xxxx' columns

	 Minimum PHP version changed to PHP 5.5
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_10_to_11($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_integrations table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."integrations` 
														ADD COLUMN `gcal_integration_status` tinyint(1) NOT NULL DEFAULT '0',
														ADD COLUMN `gcal_refresh_token` varchar(255) DEFAULT NULL,
														ADD COLUMN `gcal_access_token` varchar(255) DEFAULT NULL,
														ADD COLUMN `gcal_token_create_date` datetime DEFAULT NULL,
														ADD COLUMN `gcal_linked_user_id` int(11) DEFAULT NULL,
														ADD COLUMN `gcal_calendar_id` varchar(255) DEFAULT NULL,
														ADD COLUMN `gcal_event_title` text,
														ADD COLUMN `gcal_event_desc` text,
														ADD COLUMN `gcal_event_location` text,
														ADD COLUMN `gcal_event_allday` tinyint(1) NOT NULL DEFAULT '1',
														ADD COLUMN `gcal_start_datetime` datetime DEFAULT NULL,
														ADD COLUMN `gcal_start_date_element` int(11) DEFAULT NULL,
														ADD COLUMN `gcal_start_time_element` int(11) DEFAULT NULL,
														ADD COLUMN `gcal_start_date_type` varchar(11) NOT NULL DEFAULT 'datetime' COMMENT 'datetime,element',
														ADD COLUMN `gcal_start_time_type` varchar(11) NOT NULL DEFAULT 'datetime' COMMENT 'datetime,element',
														ADD COLUMN `gcal_end_datetime` datetime DEFAULT NULL,
														ADD COLUMN `gcal_end_date_element` int(11) DEFAULT NULL,
														ADD COLUMN `gcal_end_time_element` int(11) DEFAULT NULL,
														ADD COLUMN `gcal_end_time_type` varchar(11) NOT NULL DEFAULT 'datetime' COMMENT 'datetime,element',
														ADD COLUMN `gcal_end_date_type` varchar(11) NOT NULL DEFAULT 'datetime' COMMENT 'datetime,element',
														ADD COLUMN `gcal_duration_type` varchar(11) NOT NULL DEFAULT 'period' COMMENT 'period,datetime',
														ADD COLUMN `gcal_duration_period_length` int(11) NOT NULL DEFAULT '30',
														ADD COLUMN `gcal_duration_period_unit` varchar(11) NOT NULL DEFAULT 'minute' COMMENT 'minute,hour,day',
														ADD COLUMN `gcal_attendee_email` int(11) DEFAULT NULL,
														ADD COLUMN `gcal_delay_notification_until_paid` tinyint(1) NOT NULL DEFAULT '1',
														ADD COLUMN `gcal_delay_notification_until_approved` tinyint(1) NOT NULL DEFAULT '1';";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Alter ap_integrations table. Change column 'gsheet_integration_status' default value
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."integrations` CHANGE `gsheet_integration_status` `gsheet_integration_status` TINYINT(1)  NOT NULL  DEFAULT '0';";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		return $post_install_error;
	}

	/***************************************************************************
	 Changelog 10 to 11

	 modified tables:
	 -----------------
	 - ap_form_elements: added column 'element_media_pdf_src'

	 new tables:
	 -----------
	 - ap_form_pdf_files

	 Run the following SQL:
	 ----------------------
	 - update ap_form_elements set element_guidelines = 'I understand this is a legal representation of my signature.' where element_type = 'signature';
	 
	 Run the following table creation SQL to all existing form id:
	 --------
	 CREATE TABLE `ap_form_XXXX_log` (
	  `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
	  `record_id` int(11) NOT NULL DEFAULT '0',
	  `log_time` datetime NOT NULL,
	  `log_user` text NOT NULL,
	  `log_origin` text NOT NULL,
	  `log_message` text NOT NULL,
	  PRIMARY KEY (`log_id`),
	  KEY `record_id` (`record_id`)
	 ) DEFAULT CHARSET=utf8;

	 Add the following CSS code to all view.css files:
	 ----
		#main_body form li div.media_pdf_container{
			margin: 0;
			padding: 0 0 10px 0;
		}
		#main_body form li div.media_pdf_small{
			height: 300px;
		}
		#main_body form li div.media_pdf_medium{
			height: 600px;
		}
		#main_body form li div.media_pdf_large{
			height: 900px;
		}
		.mf_signature_wrapper {
			border-radius: 5px;
			border: 1px solid #ccc;
			padding-bottom: 0px !important;
		}
		.mf_signature_clear{
			float: right;
			margin-right: 5px;
			margin-top: 5px;
			display: block;
		}
		.mf_signature_switch a{
			text-decoration: none;
			border-bottom: 1px dotted #3B699F;
			font-family: Arial, Verdana, Helvetica;
		}
		.mf_signature_switch a:visited{
			color: #3661A1;
		}
		.mf_signature_switch a.active{
			text-decoration: none;
			border-bottom: none;
			background-color: #6d6d6d;
			border-radius: 3px;
			padding: 5px;
			color: #fff;
		}
		.mf_signature_draw{
			margin-top: 5px !important;
		}
		#main_body form li.signature{
			width: 97% !important;
		}
		#main_body form li.signature div span {
			width:auto;
		}
	 
	***************************************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_11_to_12($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_form_elements table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` ADD COLUMN `element_media_pdf_src` text;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Create ap_form_pdf_files table
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_pdf_files` (
													    		  `form_id` int(11) NOT NULL,
																  `file_name` text NOT NULL,
																  `file_content` longblob,
																  KEY `form_id` (`form_id`,`file_name`(100))
															) DEFAULT CHARACTER SET utf8;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Run SQL
		$query = "UPDATE `".MF_TABLE_PREFIX."form_elements` SET element_guidelines = 'I understand this is a legal representation of my signature.' WHERE element_type = 'signature';";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Create ap_form_xx_log table for all existing forms
		$query  = "select `form_id` from ".MF_TABLE_PREFIX."forms where form_active in(0,1)";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
	
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		foreach ($form_id_array as $form_id) {
			$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_{$form_id}_log` (
												  `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
												  `record_id` int(11) NOT NULL DEFAULT '0',
												  `log_time` datetime NOT NULL,
												  `log_user` text NOT NULL,
												  `log_origin` text NOT NULL,
												  `log_message` text NOT NULL,
												  PRIMARY KEY (`log_id`),
												  KEY `record_id` (`record_id`)
												) DEFAULT CHARSET=utf8;";

			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				$post_install_error .= $e->getMessage().'<br/><br/>';
			}
		}

		//5. Update view.css files with the new one
		foreach ($form_id_array as $form_id) {
			$target_css_file 		= $mf_settings['data_dir']."/form_{$form_id}/css/view.css";

			if(file_exists($target_css_file)){
				@unlink($target_css_file);

				$old_mask = umask(0);
				copy("./view.css",$mf_settings['data_dir']."/form_{$form_id}/css/view.css");
				umask($old_mask);
			}
		}

		return $post_install_error;
	}

	/* Changelog 12 to 13 *************************************
	
	- New tables:
	---------------------
	- ap_folders, ap_folders_conditions, ap_form_stats

	- Modified tables:
	---------------------
	- ap_users: added new column 'user_admin_theme'
	- ap_settings: added new column 'disable_pdf_link'

	- Run the following SQL:
	------------------
	update ap_settings set admin_theme = '' where admin_theme in('green','red');
	update ap_settings set admin_theme = 'light' where admin_theme in('gray','brown');

	- custom tasks:
	-------
	- Convert the records on ap_dashboard_filters to ap_folders and then remove the ap_dashboard_filters table
	- Create default folder (folder_id=1,all folders,selected) for each existing user

	**********************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_12_to_13($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Create ap_folders table
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."folders` (
													    	  `user_id` int(11) NOT NULL,
															  `folder_id` int(11) NOT NULL,
															  `folder_position` int(11) NOT NULL,
															  `folder_name` varchar(255) NOT NULL DEFAULT '',
															  `folder_selected` tinyint(1) NOT NULL DEFAULT '0',
															  `rule_all_any` varchar(3) NOT NULL DEFAULT 'all',
															  PRIMARY KEY (`user_id`,`folder_id`)
															) DEFAULT CHARACTER SET utf8;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Create ap_folders_conditions table
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."folders_conditions` (
													    	  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
															  `user_id` int(11) NOT NULL,
															  `folder_id` int(11) NOT NULL,
															  `element_name` varchar(50) NOT NULL DEFAULT '',
															  `rule_condition` varchar(15) NOT NULL DEFAULT 'is',
															  `rule_keyword` varchar(255) DEFAULT NULL,
															  PRIMARY KEY (`id`)
															) DEFAULT CHARACTER SET utf8;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Create ap_form_stats table
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."form_stats` (
													    	  `form_id` int(11) unsigned NOT NULL,
															  `total_entries` int(11) unsigned DEFAULT NULL,
															  `today_entries` int(11) unsigned DEFAULT NULL,
															  `last_entry_date` datetime DEFAULT NULL,
															  PRIMARY KEY (`form_id`)
															) DEFAULT CHARACTER SET utf8;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Alter ap_users table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."users` ADD COLUMN `user_admin_theme` varchar(11) DEFAULT NULL;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//5. Alter ap_settings table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."settings` ADD COLUMN `disable_pdf_link` int(1) DEFAULT '0';";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//6. Run Custom SQL
		$query = "UPDATE `".MF_TABLE_PREFIX."settings` SET admin_theme = '' WHERE admin_theme IN('green','red');";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		$query = "UPDATE `".MF_TABLE_PREFIX."settings` SET admin_theme = 'light' WHERE admin_theme IN('gray','brown');";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//6. Custom Tasks
		//6.a. Create default folder (folder_id=1,all folders,selected) for each existing user
		//get all users first
		$query = "select `user_id` from ".MF_TABLE_PREFIX."users";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
				
		$user_id_array = array();
		while($row = mf_do_fetch_result($sth)){
			$user_id_array[] = $row['user_id'];
		}

		foreach ($user_id_array as $user_id) {
			$query = "INSERT INTO 
								`".MF_TABLE_PREFIX."folders`( 
											`user_id`, 
											`folder_id`, 
											`folder_position`, 
											`folder_name`, 
											`folder_selected`, 
											`rule_all_any`) 
						  VALUES (?, 1, 1, 'All Forms', 1, 'all');";

			$params = array($user_id);
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				$post_install_error .= $e->getMessage().'<br/><br/>';
			}
		}

		//6.b. Convert the records on ap_dashboard_filters to ap_folders
		$query = "SELECT 
						user_id,
						filter_name,
						(filter_id+1) as filter_id,
						if(filter_by = 'tags','tag',filter_by) filter_by,
						filter_keyword 
					FROM 
						`".MF_TABLE_PREFIX."dashboard_filters`";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
				
		$filters_array = array();
		$i=0;
		while($row = mf_do_fetch_result($sth)){
			$filters_array[$i]['user_id'] 		= $row['user_id'];
			$filters_array[$i]['filter_name'] 	= $row['filter_name'];
			$filters_array[$i]['filter_id'] 	= $row['filter_id'];
			$filters_array[$i]['filter_by'] 	= $row['filter_by'];
			$filters_array[$i]['filter_keyword'] = $row['filter_keyword'];
			$i++;
		}

		//insert into ap_folders and ap_folders_conditions
		if(!empty($filters_array)){
			foreach ($filters_array as $value) {
				$query = "INSERT INTO 
								`".MF_TABLE_PREFIX."folders`( 
											`user_id`, 
											`folder_id`, 
											`folder_position`, 
											`folder_name`, 
											`folder_selected`, 
											`rule_all_any`) 
						  VALUES (?, ?, ?, ?, 0, 'all');";

				$params = array($value['user_id'],$value['filter_id'],$value['filter_id'],$value['filter_name']);
				$sth = $dbh->prepare($query);
				try{
					$sth->execute($params);
				}catch(PDOException $e) {
					$post_install_error .= $e->getMessage().'<br/><br/>';
				}

				$query = "INSERT INTO 
								`".MF_TABLE_PREFIX."folders_conditions`( 
											`user_id`, 
											`folder_id`, 
											`element_name`, 
											`rule_condition`, 
											`rule_keyword`) 
						  VALUES (?, ?, ?, 'contains', ?);";

				$params = array($value['user_id'],$value['filter_id'],$value['filter_by'],$value['filter_keyword']);
				$sth = $dbh->prepare($query);
				try{
					$sth->execute($params);
				}catch(PDOException $e) {
					$post_install_error .= $e->getMessage().'<br/><br/>';
				}

			}
		}
		
		return $post_install_error;
	}

	/* Changelog 13 to 13.1 *************************************
	
	- New table:
	---------------------
	- ap_sessions

	- Modified tables:
	---------------------
	- ap_users: added new column 'folders_pinned'

	- Run the following SQL:
	------------------
	ALTER TABLE `ap_form_payments` DROP INDEX `form_id`;
	ALTER TABLE `ap_form_payments` ADD INDEX (`record_id`);
	ALTER TABLE `ap_form_payments` ADD INDEX (`form_id`);
	ALTER TABLE `ap_form_payments` ADD INDEX (`status`);

	- custom tasks:
	-------
	Go through all forms table (including review tables) and run the following query:
	ALTER TABLE `ap_form_xxx` CHANGE `resume_key` `resume_key` VARCHAR(64) DEFAULT NULL;

	**********************************************************/

	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_13_to_13_1($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//get all forms
		$query  = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
	
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		//1. Create ap_sessions table
		$query = "CREATE TABLE `".MF_TABLE_PREFIX."sessions` (
													    	  	`id` varchar(255) NOT NULL,
  																`data` mediumtext NOT NULL,
  																`timestamp` int(255) NOT NULL,
  																PRIMARY KEY (`id`)
															) DEFAULT CHARACTER SET utf8;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Alter ap_users table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."users` ADD COLUMN `folders_pinned` tinyint(1) NOT NULL DEFAULT '0';";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Run Custom SQL
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_payments` DROP INDEX `form_id`;
				  ALTER TABLE `".MF_TABLE_PREFIX."form_payments` ADD INDEX (`record_id`);
				  ALTER TABLE `".MF_TABLE_PREFIX."form_payments` ADD INDEX (`form_id`);
				  ALTER TABLE `".MF_TABLE_PREFIX."form_payments` ADD INDEX (`status`);";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		
		//4. Go through all forms table (including review tables) and run the following query:
		//ALTER TABLE `ap_form_xxx` CHANGE `resume_key` `resume_key` VARCHAR(64) DEFAULT NULL;
		foreach ($form_id_array as $form_id) {
			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}` CHANGE `resume_key` `resume_key` VARCHAR(64) DEFAULT NULL;";

			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				//discard error
			}

			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}_review` CHANGE `resume_key` `resume_key` VARCHAR(64) DEFAULT NULL;";

			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				//discard error
			}
		}
		
		return $post_install_error;
	}


	/** Changelog 13.1 to 14
	- Go through all forms table (including review tables) and run the following query:
	ALTER TABLE `ap_form_xxx` ADD COLUMN `edit_key` VARCHAR(64) DEFAULT NULL;
	ALTER TABLE `ap_form_xxx` ADD UNIQUE INDEX (`edit_key`);


	- ap_forms: added new column 'form_entry_edit_enable','form_entry_edit_resend_notifications','form_entry_edit_rerun_logics'
							 'form_entry_edit_auto_disable','form_entry_edit_auto_disable_period','form_entry_edit_auto_disable_unit','form_entry_edit_hide_editlink'

	*/
	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_13_1_to_14($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//get all forms
		$query  = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
	
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		//1. Alter ap_forms table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` 
													ADD COLUMN `form_entry_edit_enable` tinyint(1) NOT NULL DEFAULT '0',
													ADD COLUMN `form_entry_edit_resend_notifications` tinyint(1) NOT NULL DEFAULT '0',
													ADD COLUMN `form_entry_edit_rerun_logics` tinyint(1) NOT NULL DEFAULT '0',
													ADD COLUMN `form_entry_edit_auto_disable` tinyint(1) NOT NULL DEFAULT '0',
													ADD COLUMN `form_entry_edit_auto_disable_period` int(11) NOT NULL DEFAULT '1',
													ADD COLUMN `form_entry_edit_auto_disable_unit` char(1) NOT NULL DEFAULT 'r' COMMENT 'r,h,d',
													ADD COLUMN `form_entry_edit_hide_editlink` tinyint(1) NOT NULL DEFAULT '0';";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		
		//2. Go through all forms table (including review tables) and run queries
		foreach ($form_id_array as $form_id) {
			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}` ADD COLUMN `edit_key` VARCHAR(64) DEFAULT NULL;";

			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				//discard error
			}

			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}` ADD UNIQUE INDEX (`edit_key`);";

			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				//discard error
			}

			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}_review` ADD COLUMN `edit_key` VARCHAR(64) DEFAULT NULL;";

			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				//discard error
			}

			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}_review` ADD UNIQUE INDEX (`edit_key`);";

			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				//discard error
			}
		}
		
		return $post_install_error;
	}

	/** Changelog v14 to v15 ****
	- ap_settings: add new column 'captcha_public_key','captcha_private_key' (CLOUD ALREADY HAVE THESE COLUMNS!)

	- Run the following queries:
	----
	ALTER TABLE `ap_forms` 
	 CHANGE `payment_stripe_live_secret_key` `payment_stripe_live_secret_key` VARCHAR(255)  DEFAULT NULL,
	 CHANGE `payment_stripe_live_public_key` `payment_stripe_live_public_key` VARCHAR(255)  DEFAULT NULL,
	 CHANGE `payment_stripe_test_secret_key` `payment_stripe_test_secret_key` VARCHAR(255)  DEFAULT NULL,
	 CHANGE `payment_stripe_test_public_key` `payment_stripe_test_public_key` VARCHAR(255)  DEFAULT NULL;
	----
	
	- Go through all view.css file and add this code:
	----
	#main_body input.button_text:not(.btn_secondary):hover{
		box-shadow: 0px 0px 1px 1px #666666;
	}
	#edit_info{
		width: 400px;
		margin: 0 auto;
		margin-bottom: 20px;
		padding: 10px;
		background-color: #333;
		box-shadow: 0 0 3px rgba(0, 0, 0, 0.4);
		font-family: Arial, Verdana, Helvetica;
		color: #fff;
		text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25), 0 0 1px rgba(0, 0, 0, 0.3);
		border-radius: 2px;
		font-size: 14px;
	}
	#edit_info img{
		vertical-align: bottom;
		margin-right: 5px;
	}
	#edit_info a{
		text-decoration: none;
		text-transform: uppercase;
		color: #fff;
		margin-left: 25px;
	}
	#edit_info a:hover{
		text-decoration: underline;
	}
	#edit_info a:visited{
		color: #fff;
	}
	----*/


	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_14_to_15($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//1. Alter ap_settings table. Add new columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."settings` ADD COLUMN `captcha_public_key` text, ADD COLUMN `captcha_private_key` text;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//2. Alter ap_forms table, change columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."forms` CHANGE `payment_stripe_live_secret_key` `payment_stripe_live_secret_key` VARCHAR(255)  DEFAULT NULL,
														 CHANGE `payment_stripe_live_public_key` `payment_stripe_live_public_key` VARCHAR(255)  DEFAULT NULL,
														 CHANGE `payment_stripe_test_secret_key` `payment_stripe_test_secret_key` VARCHAR(255)  DEFAULT NULL,
														 CHANGE `payment_stripe_test_public_key` `payment_stripe_test_public_key` VARCHAR(255)  DEFAULT NULL;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		
		$query  = "select `form_id` from ".MF_TABLE_PREFIX."forms where form_active in(0,1)";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
	
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		//3. Update view.css files on all forms with the new one
		foreach ($form_id_array as $form_id) {
			$target_css_file 		= $mf_settings['data_dir']."/form_{$form_id}/css/view.css";

			if(file_exists($target_css_file)){
				@unlink($target_css_file);

				$old_mask = umask(0);
				copy("./view.css",$mf_settings['data_dir']."/form_{$form_id}/css/view.css");
				umask($old_mask);
			}
		}

		return $post_install_error;
	}

	/** Changelog 13.1 to 14
	- ALTER TABLE `ap_form_elements` CHANGE `element_file_type_list` `element_file_type_list` TEXT;
	- check into ap_form_elements table, if the value of "element_file_block_or_allow" is "b", then update the element_file_type_list with the new default accepted file types
  		(jpg, jpeg, png, gif, bmp, heic, pdf, docx, doc, xlsx, xls, ppt, pptx, txt, csv, zip, mp3, wma, mpg, mpeg, mp4, avi)

	- ALTER TABLE ap_form_elements DROP COLUMN `element_file_enable_advance`, DROP COLUMN `element_file_enable_type_limit`, DROP COLUMN `element_file_block_or_allow`;
	
	- run this query to all ap_form_XX tables:
	 ALTER TABLE `ap_form_XXXX` ADD INDEX (`status`);
	*/
	
	//this function or any other do_delta_update_xxx functions should never call the create_xxx_tables functions
	//because those create_xxx_tables are intended for new installations and the structure might be changed over time
	function do_delta_update_15_to_16($dbh,$options=array()){

		$post_install_error = '';

		$mf_settings = mf_get_settings($dbh);

		//get all forms
		$query  = "select `form_id` from ".MF_TABLE_PREFIX."forms";
		$params = array();
		$sth 	= mf_do_query($query,$params,$dbh);
	
		while($row = mf_do_fetch_result($sth)){
			$form_id = $row['form_id'];
			$form_id_array[] = $form_id;
		}

		//1. Alter ap_form_elements table. Change column
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` CHANGE `element_file_type_list` `element_file_type_list` TEXT;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		
		//3. Check into ap_form_elements table, if the value of "element_file_block_or_allow" is "b", then update the element_file_type_list with the new default accepted file types
  		//   (jpg, jpeg, png, gif, bmp, heic, pdf, docx, doc, xlsx, xls, ppt, pptx, txt, csv, zip, mp3, wma, mpg, mpeg, mp4, avi)
		$query = "UPDATE `".MF_TABLE_PREFIX."form_elements` SET `element_file_type_list`='jpg, jpeg, png, gif, bmp, heic, pdf, docx, doc, xlsx, xls, ppt, pptx, txt, csv, zip, mp3, wma, mpg, mpeg, mp4, avi' WHERE `element_file_block_or_allow`='b';";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//3. Alter ap_form_elements table. Drop columns
		$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_elements` DROP COLUMN `element_file_enable_advance`, DROP COLUMN `element_file_enable_type_limit`, DROP COLUMN `element_file_block_or_allow`;";

		$params = array();
		$sth = $dbh->prepare($query);
		try{
			$sth->execute($params);
		}catch(PDOException $e) {
			$post_install_error .= $e->getMessage().'<br/><br/>';
		}

		//4. Add index (status) on all ap_form_xxx tables
		foreach ($form_id_array as $form_id) {
			$query = "ALTER TABLE `".MF_TABLE_PREFIX."form_{$form_id}` ADD INDEX (`status`);";
			
			$params = array();
			$sth = $dbh->prepare($query);
			try{
				$sth->execute($params);
			}catch(PDOException $e) {
				//do nothing, ignore if table review not exist
			}
		}

		return $post_install_error;
	}

?>