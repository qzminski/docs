<?php

/**
 * Table tl_table
 */
$GLOBALS['TL_DCA']['tl_table'] = array
(

    // Config
    'config' => array
    (
        'dataContainer'                 => 'Table',
        'ctable'                        => array('tl_child'),
        'enableVersioning'              => true,
        'switchToEdit'                  => true,
        'closed'                        => true,
        'notEditable'                   => true,
        'notCopyable'                   => true,
        'notDeletable'                  => true,
        'doNotCopyRecords'              => true,
        'doNotDeleteRecords'            => true,
        'onload_callback' => array
        (
            array('tl_table', 'myLoadMethod')
        ),
        'onsubmit_callback' => array
        (
            array('tl_table', 'mySubmitMethod')
        ),
        'ondelete_callback' => array
        (
            array('tl_table', 'myDeleteMethod')
        ),
        'oncut_callback' => array
        (
            array('tl_table', 'myCutMethod'),
        ),
        'oncopy_callback' => array
        (
            array('tl_table', 'myCopyMethod'),
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
            'mode'                      => 3,
            'fields'                    => array('title', 'date'),
            'flag'                      => 1,
            'panelLayout'               => 'filter;search,limit'
        ),
        'label' => array
        (
            'fields'                    => array('title'),
            'format'                    => '%s',
            'maxCharacters'             => 100,
            'showColumns'               => true,
            'label_callback'            => array('%TABLE%', 'addIcon'),
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'                 => '&$GLOBALS[\'TL_LANG\'][\'MSC\'][\'all\']',
                'href'                  => 'act=select',
                'class'                 => 'header_edit_all',
                'attributes'            => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'                 => '&$GLOBALS[\'TL_LANG\'][\'tl_table\'][\'edit\']',
                'href'                  => 'act=edit',
                'icon'                  => 'edit.gif'
            ),
            'copy' => array
            (
                'label'                 => '&$GLOBALS[\'TL_LANG\'][\'tl_table\'][\'copy\']',
                'href'                  => 'act=copy',
                'icon'                  => 'copy.gif'
            ),
            'delete' => array
            (
                'label'                 => '&$GLOBALS[\'TL_LANG\'][\'tl_table\'][\'delete\']',
                'href'                  => 'act=delete',
                'icon'                  => 'delete.gif',
                'attributes'            => 'onclick="if(!confirm(\' . $GLOBALS[\'TL_LANG\'][\'MSC\'][\'deleteConfirm\'] . \'))return false;Backend.getScrollOffset()"'
            ),
            'show' => array
            (
                'label'                 => '&$GLOBALS[\'TL_LANG\'][\'tl_table\'][\'show\']',
                'href'                  => 'act=show',
                'icon'                  => 'show.gif'
            )
        )
    ),

    // Palettes
    'palettes' => array
    (
        'default'                       => '{title_legend},title'
    ),

    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                       => "int(10) unsigned NOT NULL auto_increment"
        ),
        'pid' => array
        (
            'sql'                       => "int(10) unsigned NOT NULL default '0'",
        ),
        'tstamp' => array
        (
            'sql'                       => "int(10) unsigned NOT NULL default '0'"
        ),
        'title' => array
        (
            'label'                     => '&$GLOBALS[\'TL_LANG\'][\'tl_table\'][\'title\']',
            'exclude'                   => true,
            'search'                    => true,
            'inputType'                 => 'text',
            'eval'                      => array('mandatory'=>true, 'maxlength'=>255),
            'sql'                       => "varchar(255) NOT NULL default ''",
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
