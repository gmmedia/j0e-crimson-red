<?php

// Add more buttons to the html editor
function j0e_add_quicktags() {
    if (wp_script_is('quicktags')){
?>
    <script type="text/javascript">
	var j0e_toc = '<div id="j0e_toc">\r\n';
	j0e_toc += '<span>Table of Contents</span>\r\n';
	j0e_toc += '<ul>\r\n';
	j0e_toc += '	<li><a href="#anchor">Title</a></li>\r\n';
	j0e_toc += '	<li><a href="#anchor2">Title 2</a></li>\r\n';
	j0e_toc += '</ul>\r\n';
	j0e_toc += '</div>';
	var j0e_grid = '<div class="uk-grid uk-grid-medium">\r\n';
	j0e_grid += '    <div class="uk-width-1-3">...</div>\r\n';
	j0e_grid += '    <div class="uk-width-1-3">...</div>\r\n';
	j0e_grid += '    <div class="uk-width-1-3">...</div>\r\n';
	j0e_grid += '</div>';
	QTags.addButton( 'j0e_h2', 'h2', '<h2>', '</h2>', 'h2', 'Header 2', 1);
	QTags.addButton( 'j0e_h3', 'h3', '<h3>', '</h3>', 'h3', 'Header 3', 2);
	QTags.addButton( 'j0e_panel', 'Panel', '<div class="uk-panel uk-panel-box uk-panel-box-primary">', '</div>', 'panel', 'Panel', 206 );
	QTags.addButton( 'j0e_collumns', 'Collumns', '<p class="uk-column-1-3">', '</p>', 'collumns', 'Collumns', 208 );
	QTags.addButton( 'j0e_grid', 'Grid', j0e_grid, '', 'grid', 'Grid', 210 );
	QTags.addButton( 'j0e_icon', 'Icon', '<i class="uk-icon-exclamation">find more icons here http://getuikit.com/docs/icon.html</i>', '', 'icon', 'Icon', 211 );
	QTags.addButton( 'j0e_Button', 'Button', '<p class="uk-text-center"><a class="uk-button uk-button-primary" href="https://j0e.org/" rel="nofollow" target="_blank">', '</a></p>', 'button', 'Button', 212 );
	QTags.addButton( 'j0e_TOC', 'TOC', j0e_toc, '', 'toc', 'TOC', 214 );
    </script>
<?php
    }
}

add_action( 'admin_print_footer_scripts', 'j0e_add_quicktags' );