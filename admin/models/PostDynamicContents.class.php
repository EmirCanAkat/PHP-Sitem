<?php
include_once '../inc/DatabaseMysql.class.php';

/**
 * PostDynamicContents Class
 */
class PostDynamicContents
{
	// DB stuff
	private $conn;
	private $database;
	private $table = 'dynamic_contents';
	private $user_table = 'users';
	private $query_string;
	private $query_exe;
	private $section;
	private $resMsg;

	public function __construct()
	{
		// Instantiate DB & connect
		$this->database = new DatabaseMysql();
		$this->conn = $this->database->connect();

		$this->query_exe = false;
		$this->section = "";
	}

	public function updateData($postData)
	{
		$this->section = isset($postData['section']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['section']))))) : null;

		if ('countdown' == $this->section) {

			// Input Sanitizations
			$show_countdown = isset($postData['show_countdown']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['show_countdown']))))) : null;
			$CountdownDatetimeRange = isset($postData['CountdownDatetimeRange']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['CountdownDatetimeRange']))))) : " - ";
			$expired_text = isset($postData['expired_text']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['expired_text']))))) : null;

			// Seperate Start & End date from the daterange
			$explodeCountdownDatetimeRange = explode(' - ', $CountdownDatetimeRange);
			$start_datetime = !empty($explodeCountdownDatetimeRange) ? $explodeCountdownDatetimeRange[0] : "";
			$end_datetime = !empty($explodeCountdownDatetimeRange) ? $explodeCountdownDatetimeRange[1] : "";

			// Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$show_countdown' WHERE flag_type = '".$this->section."' AND flag_name = 'show_countdown';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$start_datetime' WHERE flag_type = '".$this->section."' AND flag_name = 'start_datetime';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$end_datetime' WHERE flag_type = '".$this->section."' AND flag_name = 'end_datetime';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$expired_text' WHERE flag_type = '".$this->section."' AND flag_name = 'expired_text';";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('homepage' == $this->section) {

			// Input Sanitizations
			$home_subtitle = isset($postData['home_subtitle']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['home_subtitle']))))) : null;
			$home_title = isset($postData['home_title']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['home_title']))))) : null;
			$enable_text_logo = isset($postData['enable_text_logo']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['enable_text_logo']))))) : null;
			$text_logo = isset($postData['text_logo']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['text_logo']))))) : null;
			$show_logo_image = isset($postData['show_logo_image']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['show_logo_image']))))) : null;
			$logo_image = isset($postData['logo_image']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['logo_image']))))) : null;
			$show_logo_favicon = isset($postData['show_logo_favicon']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['show_logo_favicon']))))) : null;
			$logo_favicon = isset($postData['logo_favicon']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['logo_favicon']))))) : null;

			# Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$home_subtitle' WHERE flag_type = '".$this->section."' AND flag_name = 'home_subtitle';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$home_title' WHERE flag_type = '".$this->section."' AND flag_name = 'home_title';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$enable_text_logo' WHERE flag_type = '".$this->section."' AND flag_name = 'enable_text_logo';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$text_logo' WHERE flag_type = '".$this->section."' AND flag_name = 'text_logo';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$show_logo_image' WHERE flag_type = '".$this->section."' AND flag_name = 'show_logo_image';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$show_logo_favicon' WHERE flag_type = '".$this->section."' AND flag_name = 'show_logo_favicon';";


			// Logo Images Upload
			$target_dir = "uploads/";
			if ($show_logo_image) {
				// Logo Image
				$logo_image = !empty($_FILES["logo_image"]["name"]) ? mysqli_escape_string($this->conn, trim($_FILES["logo_image"]["name"])) : null;
				if ($logo_image) {
					$target_file = $target_dir . basename($_FILES["logo_image"]["name"]);

					// Select file type
					$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

					// Valid file extensions
					$allowTypes = array("jpg","jpeg","png","gif");

					// Check extension
					if( in_array($imageFileType, $allowTypes) ){
						$logo_image = 'logo_image.'.$imageFileType;

					  // Insert record
					  $this->query_string .= "UPDATE ".$this->table." SET flag_value = '$logo_image' WHERE flag_type = '".$this->section."' AND flag_name = 'logo_image';";

					  // Upload file
					  move_uploaded_file($_FILES["logo_image"]["tmp_name"],$target_dir.$logo_image);

					}
				}
			} else {
				$this->query_string .= "UPDATE ".$this->table." SET flag_value = 'logo.png' WHERE flag_type = '".$this->section."' AND flag_name = 'logo_image';";
			}

			if ($show_logo_favicon) {
				// Logo Favicon
				$logo_favicon = !empty($_FILES["logo_favicon"]["name"]) ? mysqli_escape_string($this->conn, trim($_FILES["logo_favicon"]["name"])) : null;
				if ($logo_favicon) {
					$target_file = $target_dir . basename($_FILES["logo_favicon"]["name"]);

					// Select file type
					$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

					// Valid file extensions
					$allowTypes = array("jpg","jpeg","png","ico");

					// Check extension
					if( in_array($imageFileType, $allowTypes) ){
						$logo_favicon = 'logo_favicon.'.$imageFileType;

					  // Insert record
					  $this->query_string .= "UPDATE ".$this->table." SET flag_value = '$logo_favicon' WHERE flag_type = '".$this->section."' AND flag_name = 'logo_favicon';";

					  // Upload file
					  move_uploaded_file($_FILES["logo_favicon"]["tmp_name"],$target_dir.$logo_favicon);

					}
				}
			} else {
				$this->query_string .= "UPDATE ".$this->table." SET flag_value = 'logo-icon.png' WHERE flag_type = '".$this->section."' AND flag_name = 'logo_favicon';";
			}

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('callus' == $this->section) {

			// Input Sanitizations
			$show_callus = isset($postData['show_callus']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['show_callus']))))) : null;
			$display_text = isset($postData['display_text']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['display_text']))))) : null;
			$phone_number = isset($postData['phone_number']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['phone_number']))))) : null;

			# Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$show_callus' WHERE flag_type = '".$this->section."' AND flag_name = 'show_callus';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$display_text' WHERE flag_type = '".$this->section."' AND flag_name = 'display_text';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$phone_number' WHERE flag_type = '".$this->section."' AND flag_name = 'phone_number';";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('google_analytics' == $this->section) {

			// Input Sanitizations
			$use_ga = isset($postData['use_ga']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['use_ga']))))) : null;
			$enable_ip = isset($postData['enable_ip']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['enable_ip']))))) : null;
			$tracking_code = isset($postData['tracking_code']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['tracking_code']))))) : null;

			# Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$use_ga' WHERE flag_type = '".$this->section."' AND flag_name = 'use_ga';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$enable_ip' WHERE flag_type = '".$this->section."' AND flag_name = 'enable_ip';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$tracking_code' WHERE flag_type = '".$this->section."' AND flag_name = 'tracking_code';";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('maintenance' == $this->section) {

			// Input Sanitizations
			$enable_maintenance = isset($postData['enable_maintenance']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['enable_maintenance']))))) : null;

			# Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$enable_maintenance' WHERE flag_type = '".$this->section."' AND flag_name = 'enable_maintenance';";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('social_links' == $this->section) {

			// Input Sanitizations
			$show_socials = isset($postData['show_socials']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['show_socials']))))) : null;
			$links_target = isset($postData['links_target']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['links_target']))))) : null;
			$facebook_url = isset($postData['facebook_url']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['facebook_url']))))) : null;
			$twitter_url = isset($postData['twitter_url']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['twitter_url']))))) : null;
			$skype_url = isset($postData['skype_url']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['skype_url']))))) : null;
			$pinterest_url = isset($postData['pinterest_url']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['pinterest_url']))))) : null;
			$dribbble_url = isset($postData['dribbble_url']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['dribbble_url']))))) : null;
			$instagram_url = isset($postData['instagram_url']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['instagram_url']))))) : null;
			$googleplus_url = isset($postData['googleplus_url']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['googleplus_url']))))) : null;
			$linkedin_url = isset($postData['linkedin_url']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['linkedin_url']))))) : null;

			# Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$show_socials' WHERE flag_type = '".$this->section."' AND flag_name = 'show_socials';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$links_target' WHERE flag_type = '".$this->section."' AND flag_name = 'links_target';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$facebook_url' WHERE flag_type = '".$this->section."' AND flag_name = 'facebook_url';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$twitter_url' WHERE flag_type = '".$this->section."' AND flag_name = 'twitter_url';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$skype_url' WHERE flag_type = '".$this->section."' AND flag_name = 'skype_url';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$pinterest_url' WHERE flag_type = '".$this->section."' AND flag_name = 'pinterest_url';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$dribbble_url' WHERE flag_type = '".$this->section."' AND flag_name = 'dribbble_url';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$instagram_url' WHERE flag_type = '".$this->section."' AND flag_name = 'instagram_url';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$googleplus_url' WHERE flag_type = '".$this->section."' AND flag_name = 'googleplus_url';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$linkedin_url' WHERE flag_type = '".$this->section."' AND flag_name = 'linkedin_url';";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('design_templates' == $this->section) {

			// Input Sanitizations
			$dt_home_style = isset($postData['dt_home_style']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['dt_home_style']))))) : null;
			$dt_default_background = isset($postData['dt_default_background']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['dt_default_background']))))) : null;
			$dt_default_background_color = isset($postData['dt_default_background_color']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['dt_default_background_color']))))) : null;
			$dt_backgrownd_style = isset($postData['dt_backgrownd_style']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['dt_backgrownd_style']))))) : null;
			$yt_link = isset($postData['yt_link']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['yt_link']))))) : null;
			$yt_auto_play = isset($postData['yt_auto_play']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['yt_auto_play']))))) : null;
			$yt_loop = isset($postData['yt_loop']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['yt_loop']))))) : null;
			$yt_mute = isset($postData['yt_mute']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['yt_mute']))))) : null;

			if ("bg-img" == $dt_default_background) {

				// Background Images Upload
				$target_dir = "uploads/";
				// Default Background
				$dt_default_background_img = !empty($_FILES["dt_default_background_img"]["name"]) ? mysqli_escape_string($this->conn, trim($_FILES["dt_default_background_img"]["name"])) : null;
				if ($dt_default_background_img) {
					$target_file = $target_dir . basename($_FILES["dt_default_background_img"]["name"]);

					// Select file type
					$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

					// Valid file extensions
					$allowTypes = array("jpg","jpeg","png","gif");

					// Check extension
					if( in_array($imageFileType, $allowTypes) ){
						$dt_default_background_img = 'default_background_img.'.$imageFileType;

					  // Insert record
					  $this->query_string .= "UPDATE ".$this->table." SET flag_value = '$dt_default_background_img' WHERE flag_type = '".$this->section."' AND flag_name = 'dt_default_background_img';";

					  // Upload file
					  move_uploaded_file($_FILES["dt_default_background_img"]["tmp_name"],$target_dir.$dt_default_background_img);

					}
				}
			} else {
				$this->query_string .= "UPDATE ".$this->table." SET flag_value = 'bg-img-1.jpg' WHERE flag_type = '".$this->section."' AND flag_name = 'dt_default_background_img';";
			}

			# Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$dt_home_style' WHERE flag_type = '".$this->section."' AND flag_name = 'dt_home_style';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$dt_default_background' WHERE flag_type = '".$this->section."' AND flag_name = 'dt_default_background';";
			// $this->query_string .= "UPDATE ".$this->table." SET flag_value = '$dt_default_background_img' WHERE flag_type = '".$this->section."' AND flag_name = 'dt_default_background_img';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$dt_default_background_color' WHERE flag_type = '".$this->section."' AND flag_name = 'dt_default_background_color';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$dt_backgrownd_style' WHERE flag_type = '".$this->section."' AND flag_name = 'dt_backgrownd_style';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$yt_link' WHERE flag_type = '".$this->section."' AND flag_name = 'yt_link';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$yt_auto_play' WHERE flag_type = '".$this->section."' AND flag_name = 'yt_auto_play';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$yt_loop' WHERE flag_type = '".$this->section."' AND flag_name = 'yt_loop';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$yt_mute' WHERE flag_type = '".$this->section."' AND flag_name = 'yt_mute';";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('siteseo' == $this->section) {

			// Input Sanitizations
			$title_tag = isset($postData['title_tag']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['title_tag']))))) : null;
			$meta_title = isset($postData['meta_title']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['meta_title']))))) : null;
			$meta_description = isset($postData['meta_description']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['meta_description']))))) : null;
			$meta_keywords = isset($postData['meta_keywords']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['meta_keywords']))))) : null;

			# Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$title_tag' WHERE flag_type = '".$this->section."' AND flag_name = 'title_tag';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$meta_title' WHERE flag_type = '".$this->section."' AND flag_name = 'meta_title';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$meta_description' WHERE flag_type = '".$this->section."' AND flag_name = 'meta_description';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$meta_keywords' WHERE flag_type = '".$this->section."' AND flag_name = 'meta_keywords';";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('smtp_settings' == $this->section) {

			// Input Sanitizations
			$enable_smtp = isset($postData['enable_smtp']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['enable_smtp']))))) : null;
			$smtp_host = isset($postData['smtp_host']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['smtp_host']))))) : null;
			$smtp_username = isset($postData['smtp_username']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['smtp_username']))))) : null;
			$smtp_password = isset($postData['smtp_password']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['smtp_password']))))) : null;
			$smtp_secure = isset($postData['smtp_secure']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['smtp_secure']))))) : null;
			$smtp_port = isset($postData['smtp_port']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['smtp_port']))))) : null;
			$noreply_email = isset($postData['noreply_email']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['noreply_email']))))) : null;

			# Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$enable_smtp' WHERE flag_type = '".$this->section."' AND flag_name = 'enable_smtp';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$smtp_host' WHERE flag_type = '".$this->section."' AND flag_name = 'smtp_host';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$smtp_username' WHERE flag_type = '".$this->section."' AND flag_name = 'smtp_username';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$smtp_password' WHERE flag_type = '".$this->section."' AND flag_name = 'smtp_password';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$smtp_secure' WHERE flag_type = '".$this->section."' AND flag_name = 'smtp_secure';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$smtp_port' WHERE flag_type = '".$this->section."' AND flag_name = 'smtp_port';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$noreply_email' WHERE flag_type = '".$this->section."' AND flag_name = 'noreply_email';";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('aboutpage' == $this->section) {

			// Input Sanitizations
			$show_aboutpage = isset($postData['show_aboutpage']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['show_aboutpage']))))) : null;
			$about_subtitle = isset($postData['about_subtitle']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['about_subtitle']))))) : null;
			$about_title = isset($postData['about_title']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['about_title']))))) : null;

			$about_content = isset($postData['about_content']) ? mysqli_escape_string($this->conn, trim($postData['about_content'])) : null;
			$about_content = strip_tags($about_content, '<p><a><img><table><tbody><tfoot><tr><th><td><hr><blockquote><strong><em><ul><ol><li><h1><h2><h3><h4><h5><h6><div><small><span><big><code><samp><var><del><ins><tt><cite><q><pre>');

			$show_about_button_1 = isset($postData['show_about_button_1']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['show_about_button_1']))))) : null;
			$about_button_1_txt = isset($postData['about_button_1_txt']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['about_button_1_txt']))))) : null;
			$about_button_1_link = isset($postData['about_button_1_link']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['about_button_1_link']))))) : null;
			$show_about_button_2 = isset($postData['show_about_button_2']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['show_about_button_2']))))) : null;
			$about_button_2_txt = isset($postData['about_button_2_txt']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['about_button_2_txt']))))) : null;
			$about_button_2_link = isset($postData['about_button_2_link']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['about_button_2_link']))))) : null;
			$about_img_1_atl = isset($postData['about_img_1_atl']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['about_img_1_atl']))))) : null;
			$about_img_2_atl = isset($postData['about_img_2_atl']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['about_img_2_atl']))))) : null;
			$about_img_3_atl = isset($postData['about_img_3_atl']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['about_img_3_atl']))))) : null;
			$about_img_4_atl = isset($postData['about_img_4_atl']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['about_img_4_atl']))))) : null;
			$show_about_images = isset($postData['show_about_images']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['show_about_images']))))) : null;

			// About Images Upload
			$target_dir = "uploads/";
			// Image 1
			$about_img_1 = !empty($_FILES["about_img_1"]["name"]) ? mysqli_escape_string($this->conn, trim($_FILES["about_img_1"]["name"])) : null;
			if ($about_img_1) {
				$target_file = $target_dir . basename($_FILES["about_img_1"]["name"]);

				// Select file type
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

				// Valid file extensions
				$allowTypes = array("jpg","jpeg","png","gif");

				// Check extension
				if( in_array($imageFileType, $allowTypes) ){
					$about_img_1 = 'about_img_1.'.$imageFileType;

				  // Insert record
				  $this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_img_1' WHERE flag_type = '".$this->section."' AND flag_name = 'about_img_1';";

				  // Upload file
				  move_uploaded_file($_FILES["about_img_1"]["tmp_name"],$target_dir.$about_img_1);

				}
			}
			// Image 2
			$about_img_2 = !empty($_FILES["about_img_2"]["name"]) ? mysqli_escape_string($this->conn, trim($_FILES["about_img_2"]["name"])) : null;
			if ($about_img_2) {
				$target_file = $target_dir . basename($_FILES["about_img_2"]["name"]);

				// Select file type
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

				// Valid file extensions
				$allowTypes = array("jpg","jpeg","png","gif");

				// Check extension
				if( in_array($imageFileType, $allowTypes) ){
					$about_img_2 = 'about_img_2.'.$imageFileType;

				  // Insert record
				  $this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_img_2' WHERE flag_type = '".$this->section."' AND flag_name = 'about_img_2';";

				  // Upload file
				  move_uploaded_file($_FILES["about_img_2"]["tmp_name"],$target_dir.$about_img_2);

				}
			}
			// Image 3
			$about_img_3 = !empty($_FILES["about_img_3"]["name"]) ? mysqli_escape_string($this->conn, trim($_FILES["about_img_3"]["name"])) : null;
			if ($about_img_3) {
				$target_file = $target_dir . basename($_FILES["about_img_3"]["name"]);

				// Select file type
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

				// Valid file extensions
				$allowTypes = array("jpg","jpeg","png","gif");

				// Check extension
				if( in_array($imageFileType, $allowTypes) ){
					$about_img_3 = 'about_img_3.'.$imageFileType;

				  // Insert record
				  $this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_img_3' WHERE flag_type = '".$this->section."' AND flag_name = 'about_img_3';";

				  // Upload file
				  move_uploaded_file($_FILES["about_img_3"]["tmp_name"],$target_dir.$about_img_3);

				}
			}
			// Image 4
			$about_img_4 = !empty($_FILES["about_img_4"]["name"]) ? mysqli_escape_string($this->conn, trim($_FILES["about_img_4"]["name"])) : null;
			if ($about_img_4) {
				$target_file = $target_dir . basename($_FILES["about_img_4"]["name"]);

				// Select file type
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

				// Valid file extensions
				$allowTypes = array("jpg","jpeg","png","gif");

				// Check extension
				if( in_array($imageFileType, $allowTypes) ){
					$about_img_4 = 'about_img_4.'.$imageFileType;

				  // Insert record
				  $this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_img_4' WHERE flag_type = '".$this->section."' AND flag_name = 'about_img_4';";

				  // Upload file
				  move_uploaded_file($_FILES["about_img_4"]["tmp_name"],$target_dir.$about_img_4);

				}
			}

			# Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$show_aboutpage' WHERE flag_type = '".$this->section."' AND flag_name = 'show_aboutpage';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_subtitle' WHERE flag_type = '".$this->section."' AND flag_name = 'about_subtitle';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_title' WHERE flag_type = '".$this->section."' AND flag_name = 'about_title';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_content' WHERE flag_type = '".$this->section."' AND flag_name = 'about_content';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$show_about_button_1' WHERE flag_type = '".$this->section."' AND flag_name = 'show_about_button_1';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_button_1_txt' WHERE flag_type = '".$this->section."' AND flag_name = 'about_button_1_txt';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_button_1_link' WHERE flag_type = '".$this->section."' AND flag_name = 'about_button_1_link';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$show_about_button_2' WHERE flag_type = '".$this->section."' AND flag_name = 'show_about_button_2';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_button_2_txt' WHERE flag_type = '".$this->section."' AND flag_name = 'about_button_2_txt';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_button_2_link' WHERE flag_type = '".$this->section."' AND flag_name = 'about_button_2_link';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_img_1_atl' WHERE flag_type = '".$this->section."' AND flag_name = 'about_img_1_atl';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_img_2_atl' WHERE flag_type = '".$this->section."' AND flag_name = 'about_img_2_atl';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_img_3_atl' WHERE flag_type = '".$this->section."' AND flag_name = 'about_img_3_atl';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$about_img_4_atl' WHERE flag_type = '".$this->section."' AND flag_name = 'about_img_4_atl';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$show_about_images' WHERE flag_type = '".$this->section."' AND flag_name = 'show_about_images';";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('contactpage' == $this->section) {

			// Input Sanitizations
			$show_contactpage = isset($postData['show_contactpage']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['show_contactpage']))))) : null;
			$contact_subtitle = isset($postData['contact_subtitle']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['contact_subtitle']))))) : null;
			$contact_title = isset($postData['contact_title']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['contact_title']))))) : null;
			$fullname_field_txt = isset($postData['fullname_field_txt']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['fullname_field_txt']))))) : null;
			$phone_field_txt = isset($postData['phone_field_txt']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['phone_field_txt']))))) : null;
			$email_field_txt = isset($postData['email_field_txt']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['email_field_txt']))))) : null;
			$msg_field_txt = isset($postData['msg_field_txt']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['msg_field_txt']))))) : null;
			$send_btn_txt = isset($postData['send_btn_txt']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['send_btn_txt']))))) : null;
			$contact_success_msg = isset($postData['contact_success_msg']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['contact_success_msg']))))) : null;
			$contact_error_msg = isset($postData['contact_error_msg']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['contact_error_msg']))))) : null;
			$map_iframe = isset($postData['map_iframe']) ? mysqli_escape_string($this->conn, trim($postData['map_iframe'])) : null;
			$map_iframe = strip_tags($map_iframe, '<iframe>');

			# Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$show_contactpage' WHERE flag_type = '".$this->section."' AND flag_name = 'show_contactpage';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$contact_subtitle' WHERE flag_type = '".$this->section."' AND flag_name = 'contact_subtitle';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$contact_title' WHERE flag_type = '".$this->section."' AND flag_name = 'contact_title';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$fullname_field_txt' WHERE flag_type = '".$this->section."' AND flag_name = 'fullname_field_txt';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$phone_field_txt' WHERE flag_type = '".$this->section."' AND flag_name = 'phone_field_txt';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$email_field_txt' WHERE flag_type = '".$this->section."' AND flag_name = 'email_field_txt';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$msg_field_txt' WHERE flag_type = '".$this->section."' AND flag_name = 'msg_field_txt';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$send_btn_txt' WHERE flag_type = '".$this->section."' AND flag_name = 'send_btn_txt';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$contact_success_msg' WHERE flag_type = '".$this->section."' AND flag_name = 'contact_success_msg';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$contact_error_msg' WHERE flag_type = '".$this->section."' AND flag_name = 'contact_error_msg';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$map_iframe' WHERE flag_type = '".$this->section."' AND flag_name = 'map_iframe';";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('subscribers' == $this->section) {

			// Input Sanitizations
			$show_subscriber = isset($postData['show_subscriber']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['show_subscriber']))))) : null;
			$subs_btn_txt = isset($postData['subs_btn_txt']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['subs_btn_txt']))))) : null;
			$subs_placeholder_txt = isset($postData['subs_placeholder_txt']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['subs_placeholder_txt']))))) : null;

			# Query String
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$show_subscriber' WHERE flag_type = '".$this->section."' AND flag_name = 'show_subscriber';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$subs_btn_txt' WHERE flag_type = '".$this->section."' AND flag_name = 'subs_btn_txt';";
			$this->query_string .= "UPDATE ".$this->table." SET flag_value = '$subs_placeholder_txt' WHERE flag_type = '".$this->section."' AND flag_name = 'subs_placeholder_txt';";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} elseif ('user_pass' == $this->section) {

			// Input Sanitizations
			$admin_name = isset($postData['admin_name']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['admin_name']))))) : null;
			$admin_email = isset($postData['admin_email']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['admin_email']))))) : null;
			$admin_email = strtolower($admin_email);
			$admin_pass = isset($postData['admin_pass']) ? mysqli_escape_string($this->conn, trim(addslashes(htmlspecialchars(strip_tags($postData['admin_pass']))))) : null;

			# Query String
			$this->query_string .= "TRUNCATE TABLE ".$this->user_table.";";
			$this->query_string .= "INSERT INTO ".$this->user_table." (name, email, password) VALUES ('$admin_name', '$admin_email', '$admin_pass');";

	        // Query execution
			$this->query_exe = mysqli_multi_query($this->conn, $this->query_string) or die(mysqli_error($this->conn));

			// Return response
			$this->resMsg = ($this->query_exe) ? 'success' : 'error';

		} else {
			$this->resMsg = 'error';
		}

		$this->conn->close();
		return $this->resMsg;
	}
}