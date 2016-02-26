<?php
/**
 * Created by PhpStorm.
 * User: henribenoit
 * Date: 25/06/14
 * Time: 9:58PM
 */
if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class WPIU_Image_Table extends WP_List_Table {
	/**
	 * Prepare the items for the table to process
	 *
	 * @return Void
	 */
	function prepare_further_items( $data ) {
		$columns  = $this->get_columns();
		$hidden   = $this->get_hidden_columns();
		$sortable = $this->get_sortable_columns();

		$data = $this->table_data( $data );
		usort( $data, array( &$this, 'sort_data' ) );

		$this->_column_headers = array( $columns, $hidden, $sortable );
		$this->items           = $data;
	}

	/**
	 * Override the parent columns method. Defines the columns to use in your listing table
	 *
	 * @return Array
	 */
	function get_columns() {
		$columns = array(
			'id'    => __( 'ID', 'wpiu_domain' ),
			'path'  => __( 'Path', 'wpiu_domain' ),
			'title' => __( 'Title', 'wpiu_domain' ),
			'used'  => __( 'Used', 'wpiu_domain' ),
		);

		return $columns;
	}

	function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'id':
			case 'title':
			case 'path':
			case 'used':
				return $item[ $column_name ];
			default:
				return print_r( $item, true ); //Show the whole array for troubleshooting purposes
		}
	}

	public function get_hidden_columns() {
		return array();
	}

	public function get_sortable_columns() {
		return array(
			'title' => array( 'title', true ),
			'id'    => array( 'id', true ),
			'path'  => array( 'path', true ),
			'used'  => array( 'used', true ),
		);
	}

	private function table_data( $images ) {
		$data = array();
		foreach ( $images as $id => $file ) {
			$data[] = array(
				'id'    => $id,
				'path'  => $file["parent"][0],
				'used'  => $file["parent"]["used"],
				'title' => $file["parent"][1],
			);
		}

		return $data;
	}

	public function column_id( $item ) {
		return $item['id'];
	}

	public function column_path( $item ) {
		return $item['path'];
	}

	public function column_used( $item ) {
		return $item['used'];
	}

	public function column_title( $item ) {
		return $item['title'];
	}

	private function sort_data( $a, $b ) {
		// Set defaults
		$orderby = 'title';
		$order   = 'asc';

		// If orderby is set, use this as the sort column
		if ( ! empty( $_GET['orderby'] ) ) {
			$orderby = $_GET['orderby'];
		}

		// If order is set use this as the order
		if ( ! empty( $_GET['order'] ) ) {
			$order = $_GET['order'];
		}

		$result = strnatcmp( $a[ $orderby ], $b[ $orderby ] );

		if ( $order === 'asc' ) {
			return $result;
		}

		return - $result;
	}
}
