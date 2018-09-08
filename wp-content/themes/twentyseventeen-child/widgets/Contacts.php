<?php

class Contacts extends WP_Widget {
    /**
     * Contacts constructor.
     */
    public function __construct() {
        $widget_ops = [
            'classname'   => 'contacts-widget',
            'description' => __('Here you should write your contacts. Place this widget to footer sections'),
        ];
        parent::__construct('contacts', 'Contacts Widget', $widget_ops);
    }

    /**
     * @param array $instance
     *
     * @return string|void
     */
    public function form($instance) {
        // Check contact_number field value
        (isset($instance['contact_number']))
            ? ($contact_number = $instance['contact_number'])
            : $contact_number = __('Write Your contact number');

        // Check contact_number_label field value
        (isset($instance['contact_number_label']))
            ? ($contact_number_label = $instance['contact_number_label'])
            : $contact_number_label = __('Write contact number label');

        // Check contact_number_label field value
        (isset($instance['contact_email']))
            ? ($contact_email = $instance['contact_email'])
            : $contact_email = __('Write Your contact email');

        // Check contact_number_label field value
        (isset($instance['contact_email_label']))
            ? ($contact_email_label = $instance['contact_email_label'])
            : $contact_email_label = __('Write contact email label');

        // Check contact_number_label field value
        (isset($instance['contact_us_button']))
            ? ($contact_us_button = $instance['contact_us_button'])
            : $contact_us_button = __('Write contact email label');
        ?>
        <ul>
            <li>
                <!-- Create input for Contact Number -->
                <p>
                    <label for="<?= $this->get_field_id('contact_number'); ?>">
                        <?php _e('Input your contact number'); ?>
                    </label>
                </p>
                <input type="text"
                       id="<?= $this->get_field_id('contact_number'); ?>"
                       class="widefat"
                       name="<?= $this->get_field_name('contact_number'); ?>"
                       value="<?php echo esc_attr($contact_number); ?>"
                />
            </li>
            <li>
                <!-- Create input for Contact Number Label -->
                <p>
                    <label for="<?= $this->get_field_id('contact_number_label'); ?>">
                        <?php _e('Input label displayed near your contact number'); ?>
                    </label>
                </p>
                <input type="text"
                       id="<?= $this->get_field_id('contact_number_label'); ?>"
                       class="widefat"
                       name="<?= $this->get_field_name('contact_number_label'); ?>"
                       value="<?php echo esc_attr($contact_number_label); ?>"
                />
            </li>
            <li>
                <!-- Create input for Email -->
                <p>
                    <label for="<?= $this->get_field_id('contact_email'); ?>">
                        <?php _e('Input your contact email'); ?>
                    </label>
                </p>
                <input type="email"
                       id="<?= $this->get_field_id('contact_email'); ?>"
                       class="widefat"
                       name="<?= $this->get_field_name('contact_email'); ?>"
                       value="<?php echo esc_attr($contact_email); ?>"
                />
            </li>
            <li>
                <!-- Create input for Contact Email Label -->
                <p>
                    <label for="<?= $this->get_field_id('contact_email_label'); ?>">
                        <?php _e('Input label displayed near your contact email'); ?>
                    </label>
                </p>
                <input type="text"
                       id="<?= $this->get_field_id('contact_email_label'); ?>"
                       class="widefat"
                       name="<?= $this->get_field_name('contact_email_label'); ?>"
                       value="<?php echo esc_attr($contact_email_label); ?>"
                />
            </li>
            <li>
                <!-- Create input for Contact Us Button -->
                <p>
                    <label for="<?= $this->get_field_id('contact_us_button'); ?>">
                        <?php _e('Input text for contact-us button'); ?>
                    </label>
                </p>
                <input type="text"
                       id="<?= $this->get_field_id('contact_us_button'); ?>"
                       class="widefat"
                       name="<?= $this->get_field_name('contact_us_button'); ?>"
                       value="<?php echo esc_attr($contact_us_button); ?>"
                />
            </li>
        </ul>
        <?php
    }

    /**
     * Output widget content
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance) {
        echo $args['before_widget']; ?>
        <ul>

            <?php if ( $instance['contact_number'] ) : ?>
                <li class="contact-number">
                    <a id="contact-number" href="tel:<?php echo $instance['contact_number']; ?>">
                        <label for="contact-number"><?php echo $instance['contact_number_label']; ?></label>
                        <span class="widget-field-value">: <?php echo $instance['contact_number']; ?></span>
                    </a>
                </li>
            <?php endif;

            if ( $instance['contact_email'] ) : ?>
                <li class="contact-email">
                    <a id="contact-email" href="mailto:<?php echo $instance['contact_email']; ?>">
                        <label for="contact-email"><?php echo $instance['contact_email_label']; ?></label>
                        <span class="widget-field-value">: <?php echo $instance['contact_email']; ?></span>
                    </a>
                </li>
            <?php endif;
            if ( $instance['contact_us_button'] ) : ?>
            <li class="contact-us-button">
                <button id="contact-us-button"><?php echo $instance['contact_us_button']; ?></button>
            </li>
                <?php endif; ?>
        </ul>

        <?php echo $args['after_widget'];
    }

    /**
     * @param array $new_instance
     * @param array $old_instance
     *
     * @return array
     */

    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['contact_number'] = (!empty( $new_instance['contact_number']))
                ? strip_tags($new_instance['contact_number'])
                : '';
        $instance['contact_number_label'] = (!empty( $new_instance['contact_number_label']))
            ? strip_tags($new_instance['contact_number_label'])
            : '';
        $instance['contact_email'] = (!empty( $new_instance['contact_email']))
            ? strip_tags($new_instance['contact_email'])
            : '';
        $instance['contact_email_label'] = (!empty( $new_instance['contact_email_label']))
            ? strip_tags($new_instance['contact_email_label'])
            : '';
        $instance['contact_us_button'] = (!empty( $new_instance['contact_us_button']))
            ? strip_tags($new_instance['contact_us_button'])
            : '';

        return $instance;
    }
}
