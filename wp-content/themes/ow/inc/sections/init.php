<?php

class Section {

    function __construct( $name ) {
        $this->create_sections( $name );
    }
    private function create_sections( $name ) {
        if ( have_rows( $name ) ):
            while ( have_rows( $name ) ): the_row();
                if ( get_row_layout() === 'section_accns' ):
                    $args = array( 'content' => get_sub_field( 'content' ) );
                    $this->ow_accns( $args );
                elseif ( get_row_layout() === 'section_ctnt_sgl' ):
                    $args = array( 'content' => get_sub_field( 'content' ) );
                    $this->ow_ctnt_sgl( $args );
                elseif ( get_row_layout() === 'section_ctnt_dbl' ):
                    $args = array( 'content' => get_sub_field( 'content' ) );
                    $this->ow_ctnt_dbl( $args );
                elseif ( get_row_layout() === 'section_clts' ):
                    $args = array( 'content' => get_sub_field( 'content' ) );
                    $this->ow_clts( $args );
                elseif ( get_row_layout() === 'section_grid_image' ):
                    $args = array( 'content' => get_sub_field( 'content' ) );
                    $this->ow_grid_image( $args );
                elseif ( get_row_layout() === 'section_grid_media' ):
                    $args = array( 'content' => get_sub_field( 'content' ) );
                    $this->ow_grid_media( $args );
                elseif ( get_row_layout() === 'section_slider' ):
                    $args = array( 'content' => get_sub_field( 'content' ) );
                    $this->ow_slider( $args );
                elseif ( get_row_layout() === 'section_tabs' ):
                    $args = array( 'content' => get_sub_field( 'content' ) );
                    $this->ow_tabs( $args );
                elseif ( get_row_layout() === 'section_video' ):
                    $args = array( 'content' => get_sub_field( 'content' ) );
                    $this->ow_video( $args );
                endif;
            endwhile;
        endif;
    }
    private function ow_accns( $args ) {
        ow_sctn_accns( $args );
    }
    private function ow_clts( $args ) {
        ow_sctn_clts( $args );
    }
    private function ow_ctnt_sgl( $args ) {
        ow_sctn_ctnt_sgl( $args );
    }
    private function ow_ctnt_dbl( $args ) {
        ow_sctn_ctnt_dbl( $args );
    }
    private function ow_grid_image( $args ) {
        ow_sctn_grid_image( $args );
    }
    private function ow_grid_media( $args ) {
        ow_sctn_grid_media( $args );
    }
    private function ow_slider( $args ) {
        ow_sctn_slider( $args );
    }
    private function ow_tabs( $args ) {
        ow_sctn_tabs( $args );
    }
    private function ow_video( $args ) {
        ow_sctn_video( $args );
    }
}

require 'accordions.php';
require 'callouts.php';
require 'ctnt-dbl.php';
require 'ctnt-sgl.php';
require 'grid-image.php';
require 'grid-media.php';
require 'slider.php';
require 'tabs.php';
require 'video.php';