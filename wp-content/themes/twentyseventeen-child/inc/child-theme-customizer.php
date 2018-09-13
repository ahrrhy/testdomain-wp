<?php

/**
 * @param $wp_customize
 */
function customizer_contacts( $wp_customize ) {

    /**
     * Add Panel
     */
    $wp_customize->add_panel(
        'footer_contacts',
        [
            'title' => __( 'Footer Contacts' ),
            'description'     => esc_html__( 'Add your contacts to footer' ),
            'priority'        => 160,
            'capability'      => 'edit_theme_options',
            'theme_supports'  => '',
            'active_callback' => '',
        ]
    );

    $wp_customize->add_section(
        'footer_contacts',
        [
            'title'              => __( 'Contacts' ),
            'description'        => esc_html__( 'These are an example of Customizer Custom Controls.' ),
            'panel'              => 'footer_contacts',
            'priority'           => 160,
            'capability'         => 'edit_theme_options',
            'description_hidden' => 'false',
        ]
    );

    /** Phone Custom Settings */
    $wp_customize->add_setting(
        'contact_phone',
        [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'dirty' => false,
        ]
    );

    $wp_customize->add_control(
        'contact_phone',
        [
            'label' => __( 'Contact phone number' ),
            'description' => esc_html__( 'Add your contact phone number' ),
            'section'     => 'footer_contacts',
            'priority'    => 10,
            'type'        => 'text',
            'capability'  => 'edit_theme_options',
            'default'     => '9876543210',
            'input_attrs' =>
                [
                    'style'       => 'border: 1px solid #ddd',
                    'placeholder' => __( 'Enter phone' ),
                ],
        ]
    );

    $wp_customize->add_setting(
        'contact_phone_label',
        [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'dirty' => false,
        ]
    );

    $wp_customize->add_control(
        'contact_phone_label',
        [
            'label' => __( 'Contact phone number label' ),
            'description' => esc_html__( 'Add your contact phone number Label' ),
            'section'     => 'footer_contacts',
            'priority'    => 10,
            'type'        => 'text',
            'capability'  => 'edit_theme_options',
            'default'     => 'Call Us',
            'input_attrs' =>
                [
                    'style'       => 'border: 1px solid #ddd',
                    'placeholder' => __( 'Enter label' ),
                ],
        ]
    );

    /** Email Custom Settings */
    $wp_customize->add_setting(
        'contact_email',
        [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'dirty' => false,
        ]
    );

    $wp_customize->add_control(
        'contact_email',
        [
            'label' => __( 'Contact email address' ),
            'description' => esc_html__( 'Add your contact email address' ),
            'section'     => 'footer_contacts',
            'priority'    => 10,
            'type'        => 'text',
            'capability'  => 'edit_theme_options',
            'default'     => 'testdomain@mail.to',
            'input_attrs' =>
                [
                    'style'       => 'border: 1px solid #ddd',
                    'placeholder' => __( 'Enter email' ),
                ],
        ]
    );

    $wp_customize->add_setting(
        'contact_email_label',
        [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'dirty' => false,
        ]
    );

    $wp_customize->add_control(
        'contact_email_label',
        [
            'label' => __( 'Contact email address label' ),
            'description' => esc_html__( 'Add your contact email address Label' ),
            'section'     => 'footer_contacts',
            'priority'    => 10,
            'type'        => 'text',
            'capability'  => 'edit_theme_options',
            'default'     => 'Email',
            'input_attrs' =>
                [
                    'style'       => 'border: 1px solid #ddd',
                    'placeholder' => __( 'Enter label' ),
                ],
        ]
    );

    /** Button Custom Settings */
    $wp_customize->add_setting(
        'contact_us_button',
        [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'dirty' => false,
        ]
    );

    $wp_customize->add_control(
        'contact_us_button',
        [
            'label' => __( 'Contact-Us button label' ),
            'description' => esc_html__( 'Add contact-us button label' ),
            'section'     => 'footer_contacts',
            'priority'    => 10,
            'type'        => 'text',
            'capability'  => 'edit_theme_options',
            'default'     => 'Contact Us',
            'input_attrs' =>
                [
                    'style'       => 'border: 1px solid #ddd',
                    'placeholder' => __( 'Enter button label' ),
                ],
        ]
    );
}

add_action( 'customize_register', 'customizer_contacts' );