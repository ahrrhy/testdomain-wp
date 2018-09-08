<?php

require( 'Contacts.php' );

function contact_widget() {
    register_widget( 'Contacts' );
}

add_action( 'widgets_init', 'contact_widget' );