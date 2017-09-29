<?php
$sidebar_id = 'sidebar-1';
$sidebars_widgets = wp_get_sidebars_widgets();
$widget_ids = $sidebars_widgets[$sidebar_id];
    foreach( $widget_ids as $id ) {
        $wdgtvar = 'widget_'._get_widget_id_base( $id );
        $idvar = _get_widget_id_base( $id );
        $instance = get_option( $wdgtvar );
        $idbs = str_replace( $idvar.'-', '', $id );

				echo "<pre>".print_r($id . ' ' .$instance[$idbs]['title'],true)."</pre>";
    }
 ?>
