<?php
/**
 * Component for Agency Statement on Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package go
 */

 $quotes = get_field( 'quotes' );

 if ( $quotes ) { ?>
 <section class="quote-section container-fluid home-quote" id="anchor">
   <div class="quote-container container">
     <ul class="quotes-list">
       <?php
       $counter = 0;
       while ( have_rows( 'quotes' ) ) : the_row();
         $quote = get_sub_field( 'quote' );
         $person = get_sub_field( 'person' );
         $company = get_sub_field( 'company' );
         $counter++;

         if( $quote ){ ?>
           <li class="quote-container col-md-4 col-xs-12" id="quote-<?php echo($counter);?>">
             <blockquote class="quote graphiksemibold whitetxt">
               <?= $quote ?>
             </blockquote>
             <?php if ($person || $company){ ?>
               <div class="quote-from">
                 <div class="content">
                   <?php if ($person){ ?>
                     <p class="person">
                       <?= $person ?>
                     </p>
                   <?php } ?>
                   <?php if ($company){ ?>
                     <p class="company">
                       <?= $company ?>
                     </p>
                   <?php } ?>
                 </div>
               </div>
             <?php } ?>
           </li>
         <?php } ?>
       <?php endwhile; ?>
     </ul>
   </div>
 </section>
 <?php } ?>
