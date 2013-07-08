<?php

/**
 * Table tl_table
 */
$GLOBALS['TL_DCA']['tl_table'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'onload_callback' => array
		(
			array('tl_table', 'testMethod')
		),
		'onsubmit_callback' => array
		(
			array('tl_table', 'testMethod'),
			array('tl_table', 'testMethod')
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'pid' => 'index'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title', 'date'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => '&$GLOBALS[\'TL_LANG\'][\'MSC\'][\'all\']',
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => '&$GLOBALS[\'TL_LANG\'][\'tl_table\'][\'edit\']',
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => '&$GLOBALS[\'TL_LANG\'][\'tl_table\'][\'copy\']',
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => '&$GLOBALS[\'TL_LANG\'][\'tl_table\'][\'delete\']',
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\' . $GLOBALS[\'TL_LANG\'][\'MSC\'][\'deleteConfirm\'] . \'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => '&$GLOBALS[\'TL_LANG\'][\'tl_table\'][\'show\']',
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => '{title_legend},title'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => '&$GLOBALS[\'TL_LANG\'][\'tl_table\'][\'title\']',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255),
			'sql'                     => "varchar(255) NOT NULL default ''",
			'load_callback' => array
			(
				array('tl_table', 'loadTitle'),
				array('tl_table', 'loadTitle2'),
				array('tl_table', 'loadTitle3')
			),
			'save_callback' => array
			(
				array('tl_table', 'saveTitle')
			)
		)
	)
);
