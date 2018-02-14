<?php
?>
<section class="event-grid module">
    <div class="container">
        <?php
        if (have_rows('event_tracks')) {
            while (have_rows('event_tracks')) : the_row();
                $event_day    = get_sub_field('event_day');
                $date         = new DateTime($event_day);
                $day_name     = $date->format('l');
                $day_number   = $date->format('d');
                $month_number = $date->format('m');
                $year_number  = $date->format('Y');
                $track_title  = sprintf(
                    '%s %s.%s',
                    esc_html($day_name),
                    esc_html($month_number),
                    esc_html($day_number)
                );
                ?>
                <section class="event-track">
                    <h3><?php esc_html_e($track_title); ?></h3>
                    <?php
                    if (have_rows('events')) {
                        while (have_rows('events')) : the_row();

                            $venue_link       = get_sub_field('event_venue_link');
                            $ticket_link      = get_sub_field('event_ticket_link');
                            $venue_link_text  = get_sub_field('event_venue_link_text');
                            $ticket_link_text = get_sub_field('event_ticket_link_text');
                            $title            = get_sub_field('event_title');
                            $event_date       = sprintf(
                                '%s.%s.%s',
                                $month_number,
                                $day_number,
                                $year_number
                            );
                            ?>
                            <article class="event">
                                <div class="event-wrapper">
                                    <h4><?php esc_html_e($title); ?></h4>
                                    <a class="event-venue-link" href="<?php echo esc_url($venue_link); ?>">
                                        <p><?php esc_html_e($event_date); ?></p>
                                        <p><?php _e($venue_link_text ?: 'Venue Info') ?></p>
                                    </a>
                                </div>
                                <a class="event-ticket-link" href="<?php echo esc_url($venue_link) ?>">
                                    <button><?php _e($ticket_link_text ?: 'Buy Tickets') ?></button>
                                </a>
                            </article>

                        <?php
                        endwhile;
                    } // end if().
                    ?>
                </section>
            <?php
            endwhile;
        } // end if().
        ?>
    </div>
</section>
