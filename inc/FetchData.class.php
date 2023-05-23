<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;

$DynamicContentsPath = "{$base_dir}admin{$ds}models{$ds}DynamicContents.class.php"; 
require_once($DynamicContentsPath);
/**
 * FetchData Class
 */
class FetchData
{
	// Definit Variables
	private $dynamicData = [];
	private $adminInfo = [];

	// Countdown section
	public $show_countdown = "";
	public $start_datetime = "";
	public $end_datetime = "";
	public $CountdownDatetimeRange = ' - ';
	public $expired_text = "";
	// Homepage section
	public $home_subtitle = "";
	public $home_title = "";
	public $enable_text_logo = "";
	public $text_logo = "";
	public $show_logo_image = "";
	public $logo_image = "";
	public $show_logo_favicon = "";
	public $logo_favicon = "";
	// Callus secion
	public $show_callus = "";
	public $display_text = "";
	public $phone_number = "";
	// Google Analytics section
	public $use_ga = "";
	public $enable_ip = "";
	public $tracking_code = "";
	// Maintenance Mode
	public $enable_maintenance = "";
	// Social Links section
	public $show_socials = "";
	public $links_target = "";
	public $facebook_url = "";
	public $twitter_url = "";
	public $skype_url = "";
	public $pinterest_url = "";
	public $dribbble_url = "";
	public $instagram_url = "";
	public $googleplus_url = "";
	public $linkedin_url = "";
	// Design and Templates
	public $dt_home_style = "";
	public $dt_default_background_img = "";
	public $dt_backgrownd_style = "";
	public $yt_link = "";
	public $yt_auto_play = "";
	public $yt_loop = "";
	public $yt_mute = "";
	// Site SEO
	public $title_tag = "";
	public $meta_title = "";
	public $meta_description = "";
	public $meta_keywords = "";
	// SMTP Settings
	public $enable_smtp = "";
	public $smtp_host = "";
	public $smtp_username = "";
	public $smtp_password = "";
	public $smtp_secure = "";
	public $smtp_port = "";
	public $noreply_email = "";
	// About Page
	public $show_aboutpage = "";
	public $about_subtitle = "";
	public $about_title = "";
	public $show_about_button_1 = "";
	public $about_button_1_txt = "";
	public $about_button_1_link = "";
	public $show_about_button_2 = "";
	public $about_button_2_txt = "";
	public $about_button_2_link = "";
	public $about_img_1_atl = "";
	public $about_img_2_atl = "";
	public $about_img_3_atl = "";
	public $about_img_4_atl = "";
	// Contact Page
	public $show_contactpage = "";
	public $contact_subtitle = "";
	public $contact_title = "";
	public $fullname_field_txt = "";
	public $phone_field_txt = "";
	public $email_field_txt = "";
	public $msg_field_txt = "";
	public $send_btn_txt = "";
    public $contact_success_msg = "Message";
    public $contact_error_msg = "Message";
	public $map_iframe = "";
	// Subscribers
	public $show_subscriber = "";
	public $subs_btn_txt = "";
	public $subs_placeholder_txt = "";
	// Admin User & Pass
	public $admin_name = "";
	public $admin_email = "";
	public $admin_pass = "";

	// Default DataSet
	public $default_array = [
		'countdown' => [
			'show_countdown' => 1,
			'start_datetime' => '2020-06-30 00:00:00',
			'end_datetime' => '2021-12-31 23:59:59',
			'expired_text' => 'Welcome to Our Website',
		],
		'homepage' => [
			'home_subtitle' => "Our New Website",
			'home_title' => "COMING SOON",
			'enable_text_logo' => 0,
			'text_logo' => "Crad.",
			'show_logo_image' => 1,
			'logo_image' => "logo.png",
			'show_logo_favicon' => 1,
			'logo_favicon' => "logo-icon.png",
		],
		'callus' => [
			'show_callus' => 1,
			'display_text' => "CALL US NOW!",
			'phone_number' => "+00 328 943 67",
		],
		'google_analytics' => [
			'use_ga' => null,
			'enable_ip' => null,
			'tracking_code' => null,
		],
		'maintenance' => [
			'enable_maintenance' => 0,
		],
		'social_links' => [
			'show_socials' => 1,
			'links_target' => 1,
			'facebook_url' => "#",
			'twitter_url' => "#",
			'skype_url' => "#",
			'pinterest_url' => null,
			'dribbble_url' => null,
			'instagram_url' => null,
			'googleplus_url' => null,
			'linkedin_url' => null,
		],
		'design_templates' => [
			'dt_home_style' => "style-1",
			'dt_default_background' => "bg-img",
			'dt_default_background_img' => "bg-img-1.jpg",
			'dt_default_background_color' => "#357ae8",
			'dt_backgrownd_style' => "default-style",
			'yt_link' => "https://www.youtube.com/watch?v=gYO1uk7vIcc",
			'yt_auto_play' => "true",
			'yt_loop' => "true",
			'yt_mute' => "true",
		],
		'siteseo' => [
			'title_tag' => "Welcome | Crad",
			'meta_title' => null,
			'meta_description' => null,
			'meta_keywords' => null,
		],
		'smtp_settings' => [
			'enable_smtp' => 0,
			'smtp_host' => null,
			'smtp_username' => null,
			'smtp_password' => null,
			'smtp_secure' => null,
			'smtp_port' => null,
			'noreply_email' => null,
		],
		'aboutpage' => [
			'show_aboutpage' => 1,
			'about_subtitle' => "About of Crad.",
			'about_title' => "We have 25+ years of experience.",
			'about_content' => "<p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and read on for the authoritative history.</p><blockquote class='blockquote'>The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and read on for the authoritative history.</blockquote>",
			'show_about_button_1' => 1,
			'about_button_1_txt' => "Download",
			'about_button_1_link' => "#",
			'show_about_button_2' => 1,
			'about_button_2_txt' => "Email Us",
			'about_button_2_link' => "mailto:info@domain.com",
			'about_img_1' => "team-1.png",
			'about_img_2' => "team-2.png",
			'about_img_3' => "team-3.png",
			'about_img_4' => "team-4.png",
			'about_img_1_atl' => null,
			'about_img_2_atl' => null,
			'about_img_3_atl' => null,
			'about_img_4_atl' => null,
			'show_about_images' => 1,
		],
		'contactpage' => [
			'show_contactpage' => 1,
			'contact_subtitle' => "Contact Us Today!",
			'contact_title' => "If you need any help! Please, contact us.",
			'fullname_field_txt' => "Full Name",
			'phone_field_txt' => "Phone",
			'email_field_txt' => "Email Address",
			'msg_field_txt' => "Message",
			'send_btn_txt' => "Send Message",
			'contact_success_msg' => "Your message has been sent successfully.",
			'contact_error_msg' => "Failed to sent message. Please try again later.",
			'map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7301.339860852679!2d90.40132822714259!3d23.794765305135147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70c15ea1de1%3A0x97856381e88fb311!2sBanani%20Model%20Town%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1589547578131!5m2!1sen!2sbd" style="border: 0; height: 100%; width: 100%" allowfullscreen="" aria-hidden="false"></iframe>',
		],
		'subscribers' => [
			'show_subscriber' => 1,
			'subs_btn_txt' => "SUBSCRIBE",
			'subs_placeholder_txt' => "youremail@business.domain",
		],
		'user_pass' => [
			'admin_name' => "Administrator",
			'admin_email' => "admin@app.com",
			'admin_pass' => "password1",
		],
	];

	/**
	 * Reset with Default Data
	 */
	public function __construct() {
		// Instantiate Object
		$DynamicContentsObj = new DynamicContents();

		// DynamicContents record query
		$this->dynamicData = $DynamicContentsObj->getData();
		$this->adminInfo = $DynamicContentsObj->getAdminInfo();

    }


    public function getDataSet()
	{
        // Countdown section
        $dataSet['show_countdown'] = isset($this->dynamicData['countdown']['show_countdown']['value']) ? $this->dynamicData['countdown']['show_countdown']['value'] : $this->default_array['countdown']['show_countdown'];
        $dataSet['start_datetime'] = isset($this->dynamicData['countdown']['start_datetime']['value']) ? $this->dynamicData['countdown']['start_datetime']['value'] : $this->default_array['countdown']['start_datetime'];
        $dataSet['end_datetime'] = isset($this->dynamicData['countdown']['end_datetime']['value']) ? $this->dynamicData['countdown']['end_datetime']['value'] : $this->default_array['countdown']['end_datetime'];
        $dataSet['CountdownDatetimeRange'] = $dataSet['start_datetime'] .' - '. $dataSet['end_datetime'];
        $dataSet['expired_text'] = isset($this->dynamicData['countdown']['expired_text']['value']) ? $this->dynamicData['countdown']['expired_text']['value'] : $this->default_array['countdown']['expired_text'];
        // Homepage section
        $dataSet['home_subtitle'] = isset($this->dynamicData['homepage']['home_subtitle']['value']) ? $this->dynamicData['homepage']['home_subtitle']['value'] : $this->default_array['homepage']['home_subtitle'];
        $dataSet['home_title'] = isset($this->dynamicData['homepage']['home_title']['value']) ? $this->dynamicData['homepage']['home_title']['value'] : $this->default_array['homepage']['home_title'];
        $dataSet['enable_text_logo'] = isset($this->dynamicData['homepage']['enable_text_logo']['value']) ? $this->dynamicData['homepage']['enable_text_logo']['value'] : $this->default_array['homepage']['enable_text_logo'];
        $dataSet['text_logo'] = isset($this->dynamicData['homepage']['text_logo']['value']) ? $this->dynamicData['homepage']['text_logo']['value'] : $this->default_array['homepage']['text_logo'];
        $dataSet['show_logo_image'] = isset($this->dynamicData['homepage']['show_logo_image']['value']) ? $this->dynamicData['homepage']['show_logo_image']['value'] : $this->default_array['homepage']['show_logo_image'];
        $dataSet['logo_image'] = isset($this->dynamicData['homepage']['logo_image']['value']) ? $this->dynamicData['homepage']['logo_image']['value'] : $this->default_array['homepage']['logo_image'];
        $dataSet['show_logo_favicon'] = isset($this->dynamicData['homepage']['show_logo_favicon']['value']) ? $this->dynamicData['homepage']['show_logo_favicon']['value'] : $this->default_array['homepage']['show_logo_favicon'];
        $dataSet['logo_favicon'] = isset($this->dynamicData['homepage']['logo_favicon']['value']) ? $this->dynamicData['homepage']['logo_favicon']['value'] : $this->default_array['homepage']['logo_favicon'];
        // Callus secion
        $dataSet['show_callus'] = isset($this->dynamicData['callus']['show_callus']['value']) ? $this->dynamicData['callus']['show_callus']['value'] : $this->default_array['callus']['show_callus'];
        $dataSet['display_text'] = isset($this->dynamicData['callus']['display_text']['value']) ? $this->dynamicData['callus']['display_text']['value'] : $this->default_array['callus']['display_text'];
        $dataSet['phone_number'] = isset($this->dynamicData['callus']['phone_number']['value']) ? $this->dynamicData['callus']['phone_number']['value'] : $this->default_array['callus']['phone_number'];
        // Google Analytics section
        $dataSet['use_ga'] = isset($this->dynamicData['google_analytics']['use_ga']['value']) ? $this->dynamicData['google_analytics']['use_ga']['value'] : $this->default_array['google_analytics']['use_ga'];
        $dataSet['enable_ip'] = isset($this->dynamicData['google_analytics']['enable_ip']['value']) ? $this->dynamicData['google_analytics']['enable_ip']['value'] : $this->default_array['google_analytics']['enable_ip'];
        $dataSet['tracking_code'] = isset($this->dynamicData['google_analytics']['tracking_code']['value']) ? $this->dynamicData['google_analytics']['tracking_code']['value'] : $this->default_array['google_analytics']['tracking_code'];
        // Maintenance Mode
        $dataSet['enable_maintenance'] = isset($this->dynamicData['maintenance']['enable_maintenance']['value']) ? $this->dynamicData['maintenance']['enable_maintenance']['value'] : $this->default_array['maintenance']['enable_maintenance'];
        // Social Links section
        $dataSet['show_socials'] = isset($this->dynamicData['social_links']['show_socials']['value']) ? $this->dynamicData['social_links']['show_socials']['value'] : $this->default_array['social_links']['show_socials'];
        $dataSet['links_target'] = isset($this->dynamicData['social_links']['links_target']['value']) ? $this->dynamicData['social_links']['links_target']['value'] : $this->default_array['social_links']['links_target'];
        $dataSet['facebook_url'] = isset($this->dynamicData['social_links']['facebook_url']['value']) ? $this->dynamicData['social_links']['facebook_url']['value'] : $this->default_array['social_links']['facebook_url'];
        $dataSet['twitter_url'] = isset($this->dynamicData['social_links']['twitter_url']['value']) ? $this->dynamicData['social_links']['twitter_url']['value'] : $this->default_array['social_links']['twitter_url'];
        $dataSet['skype_url'] = isset($this->dynamicData['social_links']['skype_url']['value']) ? $this->dynamicData['social_links']['skype_url']['value'] : $this->default_array['social_links']['skype_url'];
        $dataSet['pinterest_url'] = isset($this->dynamicData['social_links']['pinterest_url']['value']) ? $this->dynamicData['social_links']['pinterest_url']['value'] : $this->default_array['social_links']['pinterest_url'];
        $dataSet['dribbble_url'] = isset($this->dynamicData['social_links']['dribbble_url']['value']) ? $this->dynamicData['social_links']['dribbble_url']['value'] : $this->default_array['social_links']['dribbble_url'];
        $dataSet['instagram_url'] = isset($this->dynamicData['social_links']['instagram_url']['value']) ? $this->dynamicData['social_links']['instagram_url']['value'] : $this->default_array['social_links']['instagram_url'];
        $dataSet['googleplus_url'] = isset($this->dynamicData['social_links']['googleplus_url']['value']) ? $this->dynamicData['social_links']['googleplus_url']['value'] : $this->default_array['social_links']['googleplus_url'];
        $dataSet['linkedin_url'] = isset($this->dynamicData['social_links']['linkedin_url']['value']) ? $this->dynamicData['social_links']['linkedin_url']['value'] : $this->default_array['social_links']['linkedin_url'];
		// Design and Templates
        $dataSet['dt_home_style'] = isset($this->dynamicData['design_templates']['dt_home_style']['value']) ? $this->dynamicData['design_templates']['dt_home_style']['value'] : $this->default_array['design_templates']['dt_home_style'];
        $dataSet['dt_default_background'] = isset($this->dynamicData['design_templates']['dt_default_background']['value']) ? $this->dynamicData['design_templates']['dt_default_background']['value'] : $this->default_array['design_templates']['dt_default_background'];
        $dataSet['dt_default_background_img'] = isset($this->dynamicData['design_templates']['dt_default_background_img']['value']) ? $this->dynamicData['design_templates']['dt_default_background_img']['value'] : $this->default_array['design_templates']['dt_default_background_img'];
        $dataSet['dt_default_background_color'] = isset($this->dynamicData['design_templates']['dt_default_background_color']['value']) ? $this->dynamicData['design_templates']['dt_default_background_color']['value'] : $this->default_array['design_templates']['dt_default_background_color'];
        $dataSet['dt_backgrownd_style'] = isset($this->dynamicData['design_templates']['dt_backgrownd_style']['value']) ? $this->dynamicData['design_templates']['dt_backgrownd_style']['value'] : $this->default_array['design_templates']['dt_backgrownd_style'];
        $dataSet['yt_link'] = isset($this->dynamicData['design_templates']['yt_link']['value']) ? $this->dynamicData['design_templates']['yt_link']['value'] : $this->default_array['design_templates']['yt_link'];
        $dataSet['yt_auto_play'] = isset($this->dynamicData['design_templates']['yt_auto_play']['value']) ? $this->dynamicData['design_templates']['yt_auto_play']['value'] : $this->default_array['design_templates']['yt_auto_play'];
        $dataSet['yt_loop'] = isset($this->dynamicData['design_templates']['yt_loop']['value']) ? $this->dynamicData['design_templates']['yt_loop']['value'] : $this->default_array['design_templates']['yt_loop'];
        $dataSet['yt_mute'] = isset($this->dynamicData['design_templates']['yt_mute']['value']) ? $this->dynamicData['design_templates']['yt_mute']['value'] : $this->default_array['design_templates']['yt_mute'];
        // Site SEO
        $dataSet['title_tag'] = isset($this->dynamicData['siteseo']['title_tag']['value']) ? $this->dynamicData['siteseo']['title_tag']['value'] : $this->default_array['siteseo']['title_tag'];
        $dataSet['meta_title'] = isset($this->dynamicData['siteseo']['meta_title']['value']) ? $this->dynamicData['siteseo']['meta_title']['value'] : $this->default_array['siteseo']['meta_title'];
        $dataSet['meta_description'] = isset($this->dynamicData['siteseo']['meta_description']['value']) ? $this->dynamicData['siteseo']['meta_description']['value'] : $this->default_array['siteseo']['meta_description'];
        $dataSet['meta_keywords'] = isset($this->dynamicData['siteseo']['meta_keywords']['value']) ? $this->dynamicData['siteseo']['meta_keywords']['value'] : $this->default_array['siteseo']['meta_keywords'];
        // SMTP Settings
        $dataSet['enable_smtp'] = isset($this->dynamicData['smtp_settings']['enable_smtp']['value']) ? $this->dynamicData['smtp_settings']['enable_smtp']['value'] : $this->default_array['smtp_settings']['enable_smtp'];
        $dataSet['smtp_host'] = isset($this->dynamicData['smtp_settings']['smtp_host']['value']) ? $this->dynamicData['smtp_settings']['smtp_host']['value'] : $this->default_array['smtp_settings']['smtp_host'];
        $dataSet['smtp_username'] = isset($this->dynamicData['smtp_settings']['smtp_username']['value']) ? $this->dynamicData['smtp_settings']['smtp_username']['value'] : $this->default_array['smtp_settings']['smtp_username'];
        $dataSet['smtp_password'] = isset($this->dynamicData['smtp_settings']['smtp_password']['value']) ? $this->dynamicData['smtp_settings']['smtp_password']['value'] : $this->default_array['smtp_settings']['smtp_password'];
        $dataSet['smtp_secure'] = isset($this->dynamicData['smtp_settings']['smtp_secure']['value']) ? $this->dynamicData['smtp_settings']['smtp_secure']['value'] : $this->default_array['smtp_settings']['smtp_secure'];
        $dataSet['smtp_port'] = isset($this->dynamicData['smtp_settings']['smtp_port']['value']) ? $this->dynamicData['smtp_settings']['smtp_port']['value'] : $this->default_array['smtp_settings']['smtp_port'];
        $dataSet['noreply_email'] = isset($this->dynamicData['smtp_settings']['noreply_email']['value']) ? $this->dynamicData['smtp_settings']['noreply_email']['value'] : $this->default_array['smtp_settings']['noreply_email'];
        // About Page
        $dataSet['show_aboutpage'] = isset($this->dynamicData['aboutpage']['show_aboutpage']['value']) ? $this->dynamicData['aboutpage']['show_aboutpage']['value'] : $this->default_array['aboutpage']['show_aboutpage'];
        $dataSet['about_subtitle'] = isset($this->dynamicData['aboutpage']['about_subtitle']['value']) ? $this->dynamicData['aboutpage']['about_subtitle']['value'] : $this->default_array['aboutpage']['about_subtitle'];
        $dataSet['about_title'] = isset($this->dynamicData['aboutpage']['about_title']['value']) ? $this->dynamicData['aboutpage']['about_title']['value'] : $this->default_array['aboutpage']['about_title'];
        $dataSet['about_content'] = isset($this->dynamicData['aboutpage']['about_content']['value']) ? $this->dynamicData['aboutpage']['about_content']['value'] : $this->default_array['aboutpage']['about_content'];
        $dataSet['show_about_button_1'] = isset($this->dynamicData['aboutpage']['show_about_button_1']['value']) ? $this->dynamicData['aboutpage']['show_about_button_1']['value'] : $this->default_array['aboutpage']['show_about_button_1'];
        $dataSet['about_button_1_txt'] = isset($this->dynamicData['aboutpage']['about_button_1_txt']['value']) ? $this->dynamicData['aboutpage']['about_button_1_txt']['value'] : $this->default_array['aboutpage']['about_button_1_txt'];
        $dataSet['about_button_1_link'] = isset($this->dynamicData['aboutpage']['about_button_1_link']['value']) ? $this->dynamicData['aboutpage']['about_button_1_link']['value'] : $this->default_array['aboutpage']['about_button_1_link'];
        $dataSet['show_about_button_2'] = isset($this->dynamicData['aboutpage']['show_about_button_2']['value']) ? $this->dynamicData['aboutpage']['show_about_button_2']['value'] : $this->default_array['aboutpage']['show_about_button_2'];
        $dataSet['about_button_2_txt'] = isset($this->dynamicData['aboutpage']['about_button_2_txt']['value']) ? $this->dynamicData['aboutpage']['about_button_2_txt']['value'] : $this->default_array['aboutpage']['about_button_2_txt'];
        $dataSet['about_button_2_link'] = isset($this->dynamicData['aboutpage']['about_button_2_link']['value']) ? $this->dynamicData['aboutpage']['about_button_2_link']['value'] : $this->default_array['aboutpage']['about_button_2_link'];
        $dataSet['show_about_images'] = isset($this->dynamicData['aboutpage']['show_about_images']['value']) ? $this->dynamicData['aboutpage']['show_about_images']['value'] : $this->default_array['aboutpage']['show_about_images'];
        $dataSet['about_img_1'] = isset($this->dynamicData['aboutpage']['about_img_1']['value']) ? $this->dynamicData['aboutpage']['about_img_1']['value'] : $this->default_array['aboutpage']['about_img_1'];
        $dataSet['about_img_2'] = isset($this->dynamicData['aboutpage']['about_img_2']['value']) ? $this->dynamicData['aboutpage']['about_img_2']['value'] : $this->default_array['aboutpage']['about_img_2'];
        $dataSet['about_img_3'] = isset($this->dynamicData['aboutpage']['about_img_3']['value']) ? $this->dynamicData['aboutpage']['about_img_3']['value'] : $this->default_array['aboutpage']['about_img_3'];
        $dataSet['about_img_4'] = isset($this->dynamicData['aboutpage']['about_img_4']['value']) ? $this->dynamicData['aboutpage']['about_img_4']['value'] : $this->default_array['aboutpage']['about_img_4'];
        $dataSet['about_img_1_atl'] = isset($this->dynamicData['aboutpage']['about_img_1_atl']['value']) ? $this->dynamicData['aboutpage']['about_img_1_atl']['value'] : $this->default_array['aboutpage']['about_img_1_atl'];
        $dataSet['about_img_2_atl'] = isset($this->dynamicData['aboutpage']['about_img_2_atl']['value']) ? $this->dynamicData['aboutpage']['about_img_2_atl']['value'] : $this->default_array['aboutpage']['about_img_2_atl'];
        $dataSet['about_img_3_atl'] = isset($this->dynamicData['aboutpage']['about_img_3_atl']['value']) ? $this->dynamicData['aboutpage']['about_img_3_atl']['value'] : $this->default_array['aboutpage']['about_img_3_atl'];
        $dataSet['about_img_4_atl'] = isset($this->dynamicData['aboutpage']['about_img_4_atl']['value']) ? $this->dynamicData['aboutpage']['about_img_4_atl']['value'] : $this->default_array['aboutpage']['about_img_4_atl'];
        // Contact Page
        $dataSet['show_contactpage'] = isset($this->dynamicData['contactpage']['show_contactpage']['value']) ? $this->dynamicData['contactpage']['show_contactpage']['value'] : $this->default_array['contactpage']['show_contactpage'];
        $dataSet['contact_subtitle'] = isset($this->dynamicData['contactpage']['contact_subtitle']['value']) ? $this->dynamicData['contactpage']['contact_subtitle']['value'] : $this->default_array['contactpage']['contact_subtitle'];
        $dataSet['contact_title'] = isset($this->dynamicData['contactpage']['contact_title']['value']) ? $this->dynamicData['contactpage']['contact_title']['value'] : $this->default_array['contactpage']['contact_title'];
        $dataSet['fullname_field_txt'] = isset($this->dynamicData['contactpage']['fullname_field_txt']['value']) ? $this->dynamicData['contactpage']['fullname_field_txt']['value'] : $this->default_array['contactpage']['fullname_field_txt'];
        $dataSet['phone_field_txt'] = isset($this->dynamicData['contactpage']['phone_field_txt']['value']) ? $this->dynamicData['contactpage']['phone_field_txt']['value'] : $this->default_array['contactpage']['phone_field_txt'];
        $dataSet['email_field_txt'] = isset($this->dynamicData['contactpage']['email_field_txt']['value']) ? $this->dynamicData['contactpage']['email_field_txt']['value'] : $this->default_array['contactpage']['email_field_txt'];
        $dataSet['msg_field_txt'] = isset($this->dynamicData['contactpage']['msg_field_txt']['value']) ? $this->dynamicData['contactpage']['msg_field_txt']['value'] : $this->default_array['contactpage']['msg_field_txt'];
        $dataSet['send_btn_txt'] = isset($this->dynamicData['contactpage']['send_btn_txt']['value']) ? $this->dynamicData['contactpage']['send_btn_txt']['value'] : $this->default_array['contactpage']['send_btn_txt'];
        $dataSet['contact_success_msg'] = isset($this->dynamicData['contactpage']['contact_success_msg']['value']) ? $this->dynamicData['contactpage']['contact_success_msg']['value'] : $this->default_array['contactpage']['contact_success_msg'];
        $dataSet['contact_error_msg'] = isset($this->dynamicData['contactpage']['contact_error_msg']['value']) ? $this->dynamicData['contactpage']['contact_error_msg']['value'] : $this->default_array['contactpage']['contact_error_msg'];
        $dataSet['map_iframe'] = isset($this->dynamicData['contactpage']['map_iframe']['value']) ? $this->dynamicData['contactpage']['map_iframe']['value'] : $this->default_array['contactpage']['map_iframe'];
        // Subscribers
        $dataSet['show_subscriber'] = isset($this->dynamicData['subscribers']['show_subscriber']['value']) ? $this->dynamicData['subscribers']['show_subscriber']['value'] : $this->default_array['subscribers']['show_subscriber'];
        $dataSet['subs_btn_txt'] = isset($this->dynamicData['subscribers']['subs_btn_txt']['value']) ? $this->dynamicData['subscribers']['subs_btn_txt']['value'] : $this->default_array['subscribers']['subs_btn_txt'];
        $dataSet['subs_placeholder_txt'] = isset($this->dynamicData['subscribers']['subs_placeholder_txt']['value']) ? $this->dynamicData['subscribers']['subs_placeholder_txt']['value'] : $this->default_array['subscribers']['subs_placeholder_txt'];
        // Admin User & Pass
        $dataSet['admin_name'] = isset($this->adminInfo['admin_name']) ? $this->adminInfo['admin_name'] : $this->default_array['user_pass']['admin_name'];
        $dataSet['admin_email'] = isset($this->adminInfo['admin_email']) ? $this->adminInfo['admin_email'] : $this->default_array['user_pass']['admin_email'];
        $dataSet['admin_pass'] = isset($this->adminInfo['admin_pass']) ? $this->adminInfo['admin_pass'] : $this->default_array['user_pass']['admin_pass'];

        return $dataSet;
    }
}