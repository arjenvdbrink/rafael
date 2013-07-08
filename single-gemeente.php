<?php
/**
 * Sample template for displaying single gemeente posts.
 * Save this file as as single-gemeente.php in your current theme.
 *
 * This sample code was based off of the Starkers Baseline theme: http://starkerstheme.com/
 */

get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

    <table border="2" align="left" width="100%">
        <tr>
            <td width="100" height="24"><strong>Gemeente</strong></td>
            <td width="550" height="24"><h1><?php the_title(); ?></h1></td>
        </tr>
        <tr>
            <td width="100" height="50"><strong>Omschrijving</strong></td>
            <td width="550" height="50"><?php the_content(); ?></td>
        </tr>
        <tr>
            <td width="100" height="24"><strong>Website</strong></td>
            <td width="550" height="24"><a
                    href="<?php print_custom_field('website'); ?>"><?php print_custom_field('website'); ?></a>&nbsp;
            </td>
        </tr>
        <tr>
            <td width="100" height="20"><strong>Contactpersoon</strong></td>
            <td width="550" height="20"><?php print_custom_field('contactpersoon'); ?></td>
        </tr>
        <tr>
            <td width="100" height="24"><strong>Telefoon</strong><br/></td>
            <td width="550" height="24"><?php print_custom_field('telefoonnummer'); ?>&nbsp;</td>
        </tr>
        <tr>
            <td width="100" height="24"><strong>Emailadres</strong><br/></td>
            <td width="550" height="24"><?php print_custom_field('emailadres'); ?>&nbsp;</td>
        </tr>
        <tr>
            <td width="100" height="20"><strong>Postadres</strong></td>
            <td width="550" height="20"><?php print_custom_field('postadres'); ?>&nbsp;</td>
        </tr>
        <tr>
            <td width="100" height="20"><strong>Samenkomsten</strong></td>
            <td width="550" height="20"><?php print_custom_field('samenkomsten'); ?>&nbsp;</td>
        </tr>
        <tr>
            <td valign="center" width="100" height="300"><strong>&nbsp;</strong></td>
            <td valign="center" width="550" height="300">
                <?php if (function_exists('pronamic_google_maps')) {
                    pronamic_google_maps(array(
                        'width' => 700,
                        'height' => 300
                    ));
                }; ?>&nbsp;
            </td>
        </tr>
    </table>

<?php endwhile; // end of the loop. ?>

</div><!--end container (in header.php)-->

<?php get_footer(); ?>



