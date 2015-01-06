<?php

#-----------------------------------------------------------------
# Column Layouts
#-----------------------------------------------------------------

//Thirds
$lambda_shortcodes['headline_1'] = array( 'type'=>'s', 'title'=>__('One Third Column Shortcodes', 'Nevada' ));
$lambda_shortcodes['one_third'] = array( 'type'=>'c', 'title'=>__('One Third Column', 'Nevada' ), 'attr'=>array( 'last'=>array('type'=>'custom', 'title'=>'Last Column')));
$lambda_shortcodes['two_thirds'] = array( 'type'=>'c', 'title'=>__('Two Thirds Column', 'Nevada' ), 'attr'=>array( 'last'=>array('type'=>'custom', 'title'=>'Last Column')));

//Half
$lambda_shortcodes['headline_2'] = array( 'type'=>'s', 'title'=>__('One Half Column Shortcodes', 'Nevada' ));
$lambda_shortcodes['one_half'] = array( 'type'=>'c', 'title'=>__('One Half Column', 'Nevada' ), 'attr'=>array( 'last'=>array('type'=>'custom', 'title'=>'Last Column')));

//Fourth
$lambda_shortcodes['headline_3'] = array( 'type'=>'s', 'title'=>__('One Fourth Column Shortcodes', 'Nevada' ));
$lambda_shortcodes['one_fourth'] = array( 'type'=>'c', 'title'=>__('One Fourth Column', 'Nevada' ), 'attr'=>array( 'last'=>array('type'=>'custom', 'title'=>'Last Column')));
$lambda_shortcodes['three_fourths'] = array( 'type'=>'c', 'title'=>__('Three Fourths Column', 'Nevada' ), 'attr'=>array( 'last'=>array('type'=>'custom', 'title'=>'Last Column')));

//Fifth
$lambda_shortcodes['headline_4'] = array( 'type'=>'s', 'title'=>__('One Fifth Column Shortcodes', 'Nevada' ));
$lambda_shortcodes['one_fifth'] = array( 'type'=>'c', 'title'=>__('One Fifth Column', 'Nevada' ), 'attr'=>array( 'last'=>array('type'=>'custom', 'title'=>'Last Column')));
$lambda_shortcodes['two_fifth'] = array( 'type'=>'c', 'title'=>__('Two Fifth Column', 'Nevada' ), 'attr'=>array( 'last'=>array('type'=>'custom', 'title'=>'Last Column')));
$lambda_shortcodes['three_fifth'] = array( 'type'=>'c', 'title'=>__('Three Fifth Column', 'Nevada' ), 'attr'=>array( 'last'=>array('type'=>'custom', 'title'=>'Last Column')));
$lambda_shortcodes['four_fifth'] = array( 'type'=>'c', 'title'=>__('Four Fifth Column', 'Nevada' ), 'attr'=>array( 'last'=>array('type'=>'custom', 'title'=>'Last Column')));

//Sixth
$lambda_shortcodes['headline_5'] = array( 'type'=>'s', 'title'=>__('One Sixth Column Shortcodes', 'Nevada' ));
$lambda_shortcodes['one_sixth'] = array( 'type'=>'c', 'title'=>__('One Sixth Column', 'Nevada' ), 'attr'=>array( 'last'=>array('type'=>'custom', 'title'=>'Last Column')));
$lambda_shortcodes['five_sixth'] = array( 'type'=>'c', 'title'=>__('Five Sixth Column', 'Nevada' ), 'attr'=>array( 'last'=>array('type'=>'custom', 'title'=>'Last Column')));

#-----------------------------------------------------------------
# Elements like Tabs & Toggle or Callout
#-----------------------------------------------------------------
$lambda_shortcodes['headline_6'] = array( 'type'=>'s', 'title'=>__('Elements', 'Nevada' ));

//Toggle
$lambda_shortcodes['toggle'] = array( 'type'=>'c', 'title'=>__('Toggle Panel', 'Nevada' ), 'attr'=>array( 'title'=>array('type'=>'text', 'title'=>'Title') ));

//Tabs
$lambda_shortcodes['tabgroup'] = array( 'type'=>'m', 'title'=>__('Tabs', 'Nevada' ), 'attr'=>array('item'=>array('type'=>'custom')));

//Blockquote
$lambda_shortcodes['blockquote_left'] = array( 'type'=>'c', 'title'=>__('Blockquote (left)', 'Nevada' ));

//Blockquote
$lambda_shortcodes['blockquote_right'] = array( 'type'=>'c', 'title'=>__('Blockquote (right)', 'Nevada' ));

//Highlight
$lambda_shortcodes['highlight_one'] = array( 'type'=>'c', 'title'=>__('Highlight (style one)', 'Nevada' ));
$lambda_shortcodes['highlight_two'] = array( 'type'=>'c', 'title'=>__('Highlight (style two)', 'Nevada' ));
$lambda_shortcodes['highlight_three'] = array( 'type'=>'c', 'title'=>__('Highlight (style three)', 'Nevada' ));
$lambda_shortcodes['highlight_four'] = array( 'type'=>'c', 'title'=>__('Highlight (style four)', 'Nevada' ));

//Dropcap
$lambda_shortcodes['dropcap_one'] = array( 'type'=>'c', 'title'=>__('Dropcap One', 'Nevada' ));
$lambda_shortcodes['dropcap_two'] = array( 'type'=>'c', 'title'=>__('Dropcap Two', 'Nevada' ));

//Alerts
$lambda_shortcodes['alert'] = array( 'type'=>'c', 'title'=>__('Notification Box', 'Nevada'), 'attr'=>array('color'=>array('type'=>'radio', 'title'=>'Color', 'def'=>'info', 'opt'=>array('white'=>'White','red'=>'Red','green'=>'Green','blue'=>'Blue','yellow'=>'Yellow'))) );

?>