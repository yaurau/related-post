<?php


class Yaurau_Random_Quote_Admin
{

        public function createMenu()
     {
         /*     add_options_page(
                   'Page Title',
                   'Yaurau Random Quote',
                   'manage_options',
                   'options.php',
                   [
                       __CLASS__,
                       'settings_page'
                   ]
             );
          */
                    add_submenu_page(
                        'options-general.php',
                        'Page Title',
                        'Yaurau Random Quote',
                        'manage_options',
                        'yaurau_random_quote',
                        [__CLASS__,'settings_page']
                    );


        //Yaurau_Random_Quote_Widget::adminWidgetGet();
    }
    public function  settings_page() {

        Yaurau_Random_Quote_Widget::adminWidgetGet();

    }
    static public function getCreateMenu() {
        add_action( 'admin_menu', [__CLASS__, 'createMenu']);
    }
    static public function getSettingsLink( $actions )
    {
        $actions['settings'] = '<a href="options-general.php?page=yaurau_random_quote">Settings</a>';
        return $actions;
    }
}
