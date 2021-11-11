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
                    <td>
                        <?php if ( $mod['status'] == 'End of life' && isset($mod['link']) && $mod['link'] !== '' ) : ?>
                            <a href="<?php echo $mod['link']['url'] ?>" <?php echo $mod['link']['target'] == '_blank' ? 'target="_blank"' : '' ?>><?php echo ( $mod['link']['title'] !== '' ) ? $mod['link']['title'] : $mod['name'] ?></a>
                        <?php else: ?>
                            <?php echo $mod['name']; ?>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php 
                        if ( $mod['status'] == 'Новинка' ) {
                            echo '<div class="status-label label_new">' . $mod['status'] . '</div>';
                        } 
                        elseif ( $mod['status'] == 'End of life' && isset($mod['link']) && $mod['link'] == '') {
                            echo '<div class="status-label label_eol">' . $mod['status'] . '</div>';
                        }
                        elseif ( $mod['status'] == 'End of life' && isset($mod['link']) && $mod['link'] !== '') {
                                echo '<div class="status-label label_eol">' . 'Архив' . '</div>';
                        } else {
                            echo $mod['status'];
                        }
                        ?>
                    </td>

                    <td><?php echo ( $mod['status'] == 'End of life' && isset($mod['link']) && $mod['link'] !== '' ) ? '-' : $mod['price'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
    }
?>
<?php the_content(); ?>