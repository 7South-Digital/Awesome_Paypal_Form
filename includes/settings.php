<?php namespace Plugin;

if(! class_exists('AfpSettings')){
    class Afp_Settings{
        public $bodyEmailAdmin;
        public $bodyEmailClient;
        private $table;

        public $paypal_clientid;
        public $paypal_secret;
        public $paypal_mode;
        public $mail_body_client;
        public $mail_subject_client;
        public $mail_subject_admin;
        public $mail_email_admin;
        public $mail_body_admin;
        public $form_text_color;
        public $form_border_inut;
        public $form_label_text_color;
        public $form_label_font_size;
        public $form_button_color;
        public $form_botton_back_color;
        public $form_botton_back_color_h;
        public $form_botton_border_color;
        public $form_button_border_color_h;
        public $form_botton_color_h;
        public $form_input_font_size;
        public $link_terms_conditions;
        public $link_privacy_policy;

        function __construct(){
            global $wpdb;
            $this->table = $wpdb->prefix . 'afp_settings';
            $table  = $this->table;
            $item = $wpdb->get_results("SELECT datas FROM $table");
            $this->paypal_clientid = $item[0]->datas;
            $this->paypal_secret = $item[1]->datas;
            $this->paypal_mode = $item[2]->datas;
            $this->mail_body_client = $item[3]->datas;
            $this->mail_subject_client = $item[4]->datas;
            $this->mail_subject_admin = $item[5]->datas;
            $this->mail_email_admin = $item[6]->datas;
            $this->mail_body_admin = $item[7]->datas;
            $this->form_text_color = $item[8]->datas;
            $this->form_border_inut = $item[9]->datas;
            $this->form_label_text_color = $item[10]->datas;
            $this->form_label_font_size = $item[11]->datas;
            $this->form_button_color = $item[12]->datas;
            $this->form_botton_back_color = $item[13]->datas;
            $this->form_botton_back_color_h = $item[14]->datas;
            $this->form_botton_border_color = $item[15]->datas;
            $this->form_button_border_color_h = $item[16]->datas;
            $this->form_botton_color_h = $item[17]->datas;
            $this->form_input_font_size = $item[18]->datas;
            $this->link_terms_conditions = $item[19]->datas;
            $this->link_privacy_policy = $item[20]->datas;
        }

        /**
         * Get the value of paypal_clientid
         */
        public function getPaypal_clientid()
        {
               return $this->paypal_clientid;
        }

        /**
         * Set the value of paypal_clientid
         *
         * @return  self
         */
        public function setPaypal_clientid($paypal_clientid)
        {
            if(isset($paypal_clientid)){
                global $wpdb;
                $this->paypal_clientid = $paypal_clientid;
                $wpdb->update($this->table,['datas'=>$paypal_clientid],['setting'=>'paypal_clientid']);
                return $this;
            }else{
                return 'error';
            }

        }

        /**
         * Get the value of paypal_secret
         */
        public function getPaypal_secret():string
        {
                return $this->paypal_secret;
        }

        /**
         * Set the value of paypal_secret
         *
         * @return  self
         */
        public function setPaypal_secret($paypal_secret)
        {
                if(isset($paypal_secret)){
                        global $wpdb;
                        $this->paypal_secret = $paypal_secret;
                        $wpdb->update($this->table,['datas'=>$paypal_secret],['setting'=>'paypal_secret']);
                        return $this;
                }else{
                        return 'error';
                }
        }
        /**
         * Get the value of paypal_mode
         */
        public function getPaypal_mode():string
        {
                return $this->paypal_mode;
        }

        /**
         * Set the value of paypal_secret
         *
         * @return  self
         */
        public function setPaypal_mode($paypal_mode)
        {
                if(isset($paypal_mode)){
                        global $wpdb;
                        $this->paypal_mode = $paypal_mode;
                        $wpdb->update($this->table,['datas'=>$paypal_mode],['setting'=>'paypal_mode']);
                        return $this;
                }else{
                        return "error";
                }

        }

        /**
         * Get the value of mail_body_client
         */
        public function getMail_body_client():string
        {
                return $this->mail_body_client;
        }

        /**
         * Set the value of mail_body_client
         *
         * @return  self
         */
        public function setMail_body_client($mail_body_client)
        {
                if(isset($mail_body_client)){
                        global $wpdb;
                        $this->mail_body_client = $mail_body_client;
                        $wpdb->update($this->table,['datas'=>$mail_body_client],['setting'=>'mail_body_client']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of mail_subject_client
         */
        public function getMail_subject_client():string
        {
                return $this->mail_subject_client;
        }

        /**
         * Set the value of mail_subject_client
         *
         * @return  self
         */
        public function setMail_subject_client($mail_subject_client)
        {
                if(isset($mail_subject_client)){
                        global $wpdb;
                        $this->mail_subject_client = $mail_subject_client;
                        $wpdb->update($this->table,['datas'=>$mail_subject_client],['setting'=>'mail_subject_client']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of mail_subject_admin
         */
        public function getMail_subject_admin():string
        {
                return $this->mail_subject_admin;
        }

        /**
         * Set the value of mail_subject_admin
         *
         * @return  self
         */
        public function setMail_subject_admin($mail_subject_admin)
        {
                if(isset($mail_subject_admin)){
                        global $wpdb;
                        $this->mail_subject_admin = $mail_subject_admin;
                        $wpdb->update($this->table,['datas'=>$mail_subject_admin],['setting'=>'mail_subject_admin']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of mail_email_admin
         */
        public function getMail_email_admin():string
        {
                return $this->mail_email_admin;
        }

        /**
         * Set the value of mail_email_admin
         *
         * @return  self
         */
        public function setMail_email_admin($mail_email_admin)
        {
                if(isset($mail_email_admin)){
                        global $wpdb;
                        $this->mail_email_admin = $mail_email_admin;
                        $wpdb->update($this->table,['datas'=>$mail_email_admin],['setting'=>'mail_email_admin']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of mail_body_admin
         */
        public function getMail_body_admin():string
        {
                return $this->mail_body_admin;
        }

        /**
         * Set the value of mail_body_admin
         *
         * @return  self
         */
        public function setMail_body_admin($mail_body_admin)
        {
                if(isset($mail_body_admin)){
                        global $wpdb;
                        $this->mail_body_admin = $mail_body_admin;
                        $wpdb->update($this->table,['datas'=>$mail_body_admin],['setting'=>'mail_body_admin']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of form_text_color
         */
        public function getForm_text_color():string
        {
                return $this->form_text_color;
        }

        /**
         * Set the value of form_text_color
         *
         * @return  self
         */
        public function setForm_text_color($form_text_color)
        {
                if(isset($form_text_color)){
                        global $wpdb;
                        $this->form_text_color = $form_text_color;
                        $wpdb->update($this->table,['datas'=>$form_text_color],['setting'=>'form_text_color']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of form_border_inut
         */
        public function getForm_border_inut():string
        {
                return $this->form_border_inut;
        }

        /**
         * Set the value of form_border_inut
         *
         * @return  self
         */
        public function setForm_border_inut($form_border_inut)
        {
                if(isset($form_border_inut)){
                        global $wpdb;
                        $this->form_border_inut = $form_border_inut;
                        $wpdb->update($this->table,['datas'=>$form_border_inut],['setting'=>'form_border_inut']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of form_label_text_color
         */
        public function getForm_label_text_color():string
        {
                return $this->form_label_text_color;
        }

        /**
         * Set the value of form_label_text_color
         *
         * @return  self
         */
        public function setForm_label_text_color($form_label_text_color)
        {
                if(isset($form_label_text_color)){
                        global $wpdb;
                        $this->form_label_text_color = $form_label_text_color;
                        $wpdb->update($this->table,['datas'=>$form_label_text_color],['setting'=>'form_label_text_color']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of form_label_font_size
         */
        public function getForm_label_font_size():string
        {
                return $this->form_label_font_size;
        }

        /**
         * Set the value of form_label_font_size
         *
         * @return  self
         */
        public function setForm_label_font_size($form_label_font_size)
        {
                if(isset($form_label_font_size)){
                        global $wpdb;
                        $this->form_label_font_size = $form_label_font_size;
                        $wpdb->update($this->table,['datas'=>$form_label_font_size],['setting'=>'form_label_font_size']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of form_button_color
         */
        public function getForm_button_color():string
        {
                return $this->form_button_color;
        }

        /**
         * Set the value of form_button_color
         *
         * @return  self
         */
        public function setForm_button_color($form_button_color)
        {
                if(isset($form_button_color)){
                        global $wpdb;
                        $this->form_button_color = $form_button_color;
                        $wpdb->update($this->table,['datas'=>$form_button_color],['setting'=>'form_button_color']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of form_botton_back_color
         */
        public function getForm_botton_back_color():string
        {
                return $this->form_botton_back_color;
        }

        /**
         * Set the value of form_botton_back_color
         *
         * @return  self
         */
        public function setForm_botton_back_color($form_botton_back_color)
        {
                if(isset($form_botton_back_color)){
                        global $wpdb;
                        $this->form_botton_back_color = $form_botton_back_color;
                        $wpdb->update($this->table,['datas'=>$form_botton_back_color],['setting'=>'form_botton_back_color']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of form_botton_back_color_h
         */
        public function getForm_botton_back_color_h():string
        {
                return $this->form_botton_back_color_h;
        }

        /**
         * Set the value of form_botton_back_color_h
         *
         * @return  self
         */
        public function setForm_botton_back_color_h($form_botton_back_color_h)
        {
                if(isset($form_botton_back_color_h)){
                        global $wpdb;
                        $this->form_botton_back_color_h = $form_botton_back_color_h;
                        $wpdb->update($this->table,['datas'=>$form_botton_back_color_h],['setting'=>'form_botton_back_color_h']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of form_botton_border_color
         */
        public function getForm_botton_border_color():string
        {
                return $this->form_botton_border_color;
        }

        /**
         * Set the value of form_botton_border_color
         *
         * @return  self
         */
        public function setForm_botton_border_color($form_botton_border_color)
        {
                if(isset($form_botton_border_color)){
                        global $wpdb;
                        $this->form_botton_border_color = $form_botton_border_color;
                        $wpdb->update($this->table,['datas'=>$form_botton_border_color],['setting'=>'form_botton_border_color']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of form_button_border_color_h
         */
        public function getForm_button_border_color_h():string
        {
                return $this->form_button_border_color_h;
        }

        /**
         * Set the value of form_button_border_color_h
         *
         * @return  self
         */
        public function setForm_button_border_color_h($form_button_border_color_h)
        {
                if(isset($form_button_border_color_h)){
                        global $wpdb;
                        $this->form_button_border_color_h = $form_button_border_color_h;
                        $wpdb->update($this->table,['datas'=>$form_button_border_color_h],['setting'=>'form_button_border_color_h']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of form_botton_color_h
         */
        public function getForm_botton_color_h():string
        {
                return $this->form_botton_color_h;
        }

        /**
         * Set the value of form_botton_color_h
         *
         * @return  self
         */
        public function setForm_botton_color_h($form_botton_color_h)
        {
                if(isset($form_botton_color_h)){
                        global $wpdb;
                        $this->form_botton_color_h = $form_botton_color_h;
                        $wpdb->update($this->table,['datas'=>$form_botton_color_h],['setting'=>'form_botton_color_h']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of form_input_font_size
         */
        public function getForm_input_font_size():string
        {
                return $this->form_input_font_size;
        }

        /**
         * Set the value of form_input_font_size
         *
         * @return  self
         */
        public function setForm_input_font_size($form_input_font_size)
        {
                if(isset($form_input_font_size)){
                        global $wpdb;
                        $this->form_input_font_size = $form_input_font_size;
                        $wpdb->update($this->table,['datas'=>$form_input_font_size],['setting'=>'form_input_font_size']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of link_terms_conditions
         */
        public function getLink_terms_conditions():string
        {
                return $this->link_terms_conditions;
        }

        /**
         * Set the value of link_terms_conditions
         *
         * @return  self
         */
        public function setLink_terms_conditions($link_terms_conditions)
        {
                if(isset($link_terms_conditions)){
                        global $wpdb;
                        $this->link_terms_conditions = $link_terms_conditions;
                        $wpdb->update($this->table,['datas'=>$link_terms_conditions],['setting'=>'link_terms_conditions']);
                        return $this;
                }else{
                        return "error";
                }
        }

        /**
         * Get the value of link_privacy_policy
         */
        public function getLink_privacy_policy():string
        {
                return $this->link_privacy_policy;
        }

        /**
         * Set the value of link_privacy_policy
         *
         * @return  self
         */
        public function setLink_privacy_policy($link_privacy_policy)
        {
                if(isset($link_privacy_policy)){
                        global $wpdb;
                        $this->link_privacy_policy = $link_privacy_policy;
                        $wpdb->update($this->table,['datas'=>$link_privacy_policy],['setting'=>'link_privacy_policy']);
                        return $this;
                }else{
                        return "error";
                }
        }
        public function Refresh()
        {
                $host = $_SERVER['HTTP_HOST'];
                $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                header("refresh:300; http://$host$uri");
        }

    }
}
