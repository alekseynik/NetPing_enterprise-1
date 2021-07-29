<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;

$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );

?>

<?php if ( $heading ) : ?>
	<!-- <h2 class="h-line"><?php echo esc_html( $heading ); ?></h2> -->
<?php endif; ?>

<?php 
    $mod_fields = get_post_meta( get_the_ID(), 'mod_fields' );
    if ( !empty($mod_fields) ) {
        ?>
        <table class="product_mod_table">
            <tbody>
                <tr>
                    <th>Наименование</th>
                    <th>Статус</th>
                    <th>Рекомендованная розничная цена, руб</th>
                </tr>
                <?php foreach ($mod_fields[0] as $mod) : ?>
                <tr>
                    <td><?php echo $mod['name'] ?></td>
                    <td><div <?php echo $mod['status'] == 'Новинка' ? 'class="status-label label_new"' : ($mod['status'] == 'End of life' ? 'class="status-label label_eol"' : '') ?> ><?php echo $mod['status'] ?></div></td>
                    <td><?php echo $mod['price'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
    }
?>
<?php the_content(); ?>