<?php
/**
 * Review order form template
 *
 * DISCLAIMER
 *
 * Do not edit or add directly to this file if you wish to upgrade Jigoshop to newer
 * versions in the future. If you wish to customise Jigoshop core for your needs,
 * please use our GitHub repository to publish essential changes for consideration.
 *
 * @package    Jigoshop
 * @category   Checkout
 * @author     Jigowatt
 * @copyright  Copyright (c) 2011 Jigowatt Ltd.
 * @license    http://jigoshop.com/license/commercial-edition
 */
?>
<div id="order_review">

    <table class="shop_table">
        <thead>
            <tr>
                <th><?php _e('Product', 'jigoshop'); ?></th>
                <th><?php _e('Qty', 'jigoshop'); ?></th>
                <th><?php _e('Totals', 'jigoshop'); ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <?php if (get_option('jigoshop_calc_taxes') == 'yes' && jigoshop_cart::get_subtotal_inc_tax()) : ?>
                    <td colspan="2"><?php _e('Retail Price', 'jigoshop'); ?></td>
                <?php else : ?>
                    <td colspan="2"><?php _e('Subtotal', 'jigoshop'); ?></td>
                <?php endif; ?>
                <td><?php echo jigoshop_cart::get_cart_subtotal(); ?></td>
            </tr>

            <?php
            if (get_option('jigoshop_calc_taxes') == 'yes' && jigoshop_cart::get_subtotal_inc_tax()) :
                if (jigoshop_cart::needs_shipping()) :
                    ?><tr>
                        <td colspan="2"><?php _e('Shipping', 'jigoshop'); ?></td>
                        <td> 
                            <?php //TODO: extract this shipping section into a function. It's repeated too often in here --MM
                            $available_methods = jigoshop_shipping::get_available_shipping_methods();


                            if (sizeof($available_methods) > 0) :

                                echo '<select name="shipping_method" id="shipping_method">';

                                foreach ($available_methods as $method) :

                                    if ($method instanceof jigoshop_calculable_shipping) :
                                        if ($method->is_chosen()) :
                                            $selected_service = NULL;
                                            if (is_numeric(jigoshop_session::instance()->selected_rate_id)) :
                                                $selected_service = $method->get_selected_service( jigoshop_session::instance()->selected_rate_id);
                                            else :
                                                $selected_service = $method->get_cheapest_service();
                                            endif;
                                            for ($i = 0; $i < $method->get_rates_amount(); $i++) {
                                                echo '<option value="' . $method->id . ':' . $method->get_selected_service($i) . ':' . $i . '" ';
                                                if ($method->get_selected_service($i) == $selected_service) :
                                                    echo 'selected="selected"';
                                                endif;
                                                echo '>' . $method->get_selected_service($i) . ' via ' . $method->title . ' &ndash; ';
                                                echo jigoshop_price($method->get_selected_price($i));
                                                if ($method->shipping_tax > 0) : echo __(' (ex. tax)', 'jigoshop');
                                                endif;
                                                echo '</option>';
                                            }
                                        endif;
                                    else :
                                        echo '<option value="' . esc_attr( $method->id  ) . '::" ';
                                        if ($method->is_chosen())
                                            echo 'selected="selected"';

                                        echo '>' . $method->title . ' &ndash; ';

                                        if ($method->shipping_total > 0) :
                                            echo jigoshop_price($method->shipping_total);
                                            if ($method->shipping_tax > 0) : echo __(' (ex. tax)', 'jigoshop');
                                            endif;
                                        else :
                                            echo __('Free', 'jigoshop');
                                        endif;

                                        echo '</option>';
                                    endif;

                                endforeach;

                                echo '</select>';

                            else :
                                echo '<p>' . __(jigoshop_shipping::get_shipping_error_message(), 'jigoshop') . '</p>';
                            endif;
                            ?></td>
                    </tr>
                    <?php
                endif;
                foreach (jigoshop_cart::get_applied_tax_classes() as $tax_class) :
                    if (jigoshop_cart::is_not_compounded_tax($tax_class)) :
                        ?>
                        <tr>
                            <td colspan="2"><?php echo jigoshop_cart::get_tax_for_display($tax_class); ?></td>
                            <td><?php echo jigoshop_cart::get_tax_amount($tax_class) ?></td>
                        </tr>
                        <?php
                    endif;
                endforeach;
                ?><tr>
                    <td colspan="2"><?php _e('Subtotal', 'jigoshop'); ?></td>
                    <td><?php echo jigoshop_cart::get_subtotal_inc_tax(); ?></td>
                </tr>
                <?php
            else :
                if (jigoshop_cart::needs_shipping()) :
                    ?><tr>
                        <td colspan="2"><?php _e('Shipping', 'jigoshop'); ?></td>
                        <td>
                            <?php
                            $available_methods = jigoshop_shipping::get_available_shipping_methods();


                            if (sizeof($available_methods) > 0) :

                                echo '<select name="shipping_method" id="shipping_method">';

                                foreach ($available_methods as $method) :

                                    if ($method instanceof jigoshop_calculable_shipping) :
                                        if ($method->is_chosen()) :
                                            $selected_service = NULL;
                                            if (is_numeric( jigoshop_session::instance()->selected_rate_id )) :
                                                $selected_service = $method->get_selected_service( jigoshop_session::instance()->selected_rate_id );
                                            else :
                                                $selected_service = $method->get_cheapest_service();
                                            endif;
                                            for ($i = 0; $i < $method->get_rates_amount(); $i++) {
                                                echo '<option value="' . $method->id . ':' . $method->get_selected_service($i) . ':' . $i . '" ';
                                                if ($method->get_selected_service($i) == $selected_service) :
                                                    echo 'selected="selected"';
                                                endif;
                                                echo '>' . $method->get_selected_service($i) . ' via ' . $method->title . ' &ndash; ';
                                                echo jigoshop_price($method->get_selected_price($i));
                                                if ($method->shipping_tax > 0) : echo __(' (ex. tax)', 'jigoshop');
                                                endif;
                                                echo '</option>';
                                            }
                                        endif;
                                    else :
                                        echo '<option value="' . esc_attr( $method->id  ) . '::" ';
                                        if ($method->is_chosen())
                                            echo 'selected="selected"';

                                        echo '>' . $method->title . ' &ndash; ';

                                        if ($method->shipping_total > 0) :
                                            echo jigoshop_price($method->shipping_total);
                                            if ($method->shipping_tax > 0) : echo __(' (ex. tax)', 'jigoshop');
                                            endif;
                                        else :
                                            echo __('Free', 'jigoshop');
                                        endif;

                                        echo '</option>';
                                    endif;

                                endforeach;

                                echo '</select>';

                            else :

                                echo '<p>' . __(jigoshop_shipping::get_shipping_error_message(), 'jigoshop') . '</p>';

                            endif;
                            ?></td>
                    </tr><?php
                endif;
            endif;
            if (get_option('jigoshop_calc_taxes') == 'yes') :
                if (jigoshop_cart::get_subtotal_inc_tax()) :
                    foreach (jigoshop_cart::get_applied_tax_classes() as $tax_class) :
                        if (!jigoshop_cart::is_not_compounded_tax($tax_class)) :
                                    ?>

                            <tr>
                                <td colspan="2"><?php echo jigoshop_cart::get_tax_for_display($tax_class); ?></th>
                                <td><?php echo jigoshop_cart::get_tax_amount($tax_class) ?></td>
                            </tr>
                            <?php
                        endif;
                    endforeach;
                else :
                    foreach (jigoshop_cart::get_applied_tax_classes() as $tax_class) :
                        ?>
                        <tr>
                            <td colspan="2"><?php echo jigoshop_cart::get_tax_for_display($tax_class); ?></td>
                            <td><?php echo jigoshop_cart::get_tax_amount($tax_class) ?></td>
                        </tr>    
                        <?php
                    endforeach;
                endif;
            endif;
            ?>			

            <?php do_action('jigoshop_after_review_order_items'); ?>
            <?php if (jigoshop_cart::get_total_discount()) : ?><tr class="discount">
                    <td colspan="2"><?php _e('Discount', 'jigoshop'); ?></td>
                    <td>-<?php echo jigoshop_cart::get_total_discount(); ?></td>
                </tr><?php endif; ?>
            <tr>
                <td colspan="2"><strong><?php _e('Grand Total', 'jigoshop'); ?></strong></td>
                <td><strong><?php echo jigoshop_cart::get_total(); ?></strong></td>
            </tr>
        </tfoot>
        <tbody>
            <?php
            if (sizeof(jigoshop_cart::$cart_contents) > 0) :
                foreach (jigoshop_cart::$cart_contents as $item_id => $values) :
                    $_product = $values['data'];
                    if ($_product->exists() && $values['quantity'] > 0) :
						$variation = '';
                        if ($_product instanceof jigoshop_product_variation && is_array($values['variation'])) {
                            $variation = jigoshop_get_formatted_variation($values['variation']);
                        }
                        echo '
                            <tr>
                                <td class="product-name">' . $_product->get_title() . $variation . '</td>
								<td>' . $values['quantity'] . '</td>
								<td>' . jigoshop_price($_product->get_price_excluding_tax() * $values['quantity'], array('ex_tax_label' => 1)) . '</td>
							</tr>';
					endif;
				endforeach; 
			endif;
			?>
		</tbody>
	</table>
	
	<div id="payment">
		<?php if (jigoshop_cart::needs_payment()) : ?>
		<ul class="payment_methods methods">
			<?php 
				$available_gateways = jigoshop_payment_gateways::get_available_payment_gateways();
				if ($available_gateways) : 
					// Chosen Method
					if (sizeof($available_gateways)) {
						if( isset( $_POST[ 'payment_method' ] ) && isset( $available_gateways[ $_POST['payment_method'] ] ) ) {
							$available_gateways[ $_POST[ 'payment_method' ] ]->set_current();
						} else {
							current($available_gateways)->set_current();
						}	
					}
					foreach ($available_gateways as $gateway ) :
						?>
						<li>
						<input type="radio" id="payment_method_<?php echo $gateway->id; ?>" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php if ($gateway->chosen) echo 'checked="checked"'; ?> />
						<label for="payment_method_<?php echo $gateway->id; ?>"><?php echo $gateway->title; ?> <?php echo apply_filters('gateway_icon', $gateway->icon(), $gateway->id); ?></label> 
							<?php
								if ($gateway->has_fields || $gateway->description) : 
									echo '<div class="payment_box payment_method_' . esc_attr( $gateway->id ) . '" style="display:none;">';
									$gateway->payment_fields();
									echo '</div>';
								endif;
							?>
						</li>
						<?php
					endforeach;
				else :
				
					if ( !jigoshop_customer::get_country() ) :
						echo '<p>'.__('Please fill in your details above to see available payment methods.', 'jigoshop').'</p>';
					else :
						echo '<p>'.__('Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'jigoshop').'</p>';
					endif;
					
				endif;
			?>
		</ul>
		<?php endif; ?>

		<div class="form-row">
		
			<noscript><?php _e('Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'jigoshop'); ?><br/><input type="submit" class="button-alt" name="update_totals" value="<?php _e('Update totals', 'jigoshop'); ?>" /></noscript>
		
			<?php jigoshop::nonce_field('process_checkout')?>
			
			<?php do_action( 'jigoshop_review_order_before_submit' ); ?>
			
			<?php if (get_option('jigoshop_terms_page_id')>0) : ?>
			<p class="form-row terms">
				<label for="terms" class="checkbox"><?php _e('I accept the', 'jigoshop'); ?> <a href="<?php echo esc_url( get_permalink(get_option('jigoshop_terms_page_id')) ); ?>" target="_blank"><?php _e('terms &amp; conditions', 'jigoshop'); ?></a></label>
				<input type="checkbox" class="input-checkbox" name="terms" <?php if (isset($_POST['terms'])) echo 'checked="checked"'; ?> id="terms" />
			</p>
			<?php endif; ?>

            <a href="<?php echo home_url(); ?>"><?php echo apply_filters( 'jigoshop_order_cancel_button_text', __( 'Cancel', 'jigoshop') ) ?></a>
			
			<?php $order_button_text = apply_filters( 'jigoshop_order_button_text', __( 'Place order', 'jigoshop') ); ?>
			<input type="submit" class="button-alt" name="place_order" id="place_order" value="<?php echo esc_attr( $order_button_text ); ?>" />
			
			<?php do_action( 'jigoshop_review_order_after_submit' ); ?>
			
		</div>

	</div>

</div>