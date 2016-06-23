<?php
/* Template name: Typography */

// Load necessary UIkit components.
add_action( 'beans_uikit_enqueue_scripts', 'example_view_enqueue_uikit_assets' );

function example_view_enqueue_uikit_assets() {

	beans_uikit_enqueue_components( array( 'modal', 'tab' ), 'core' );
	beans_uikit_enqueue_components( array( 'tooltip', 'progress', 'modal', 'offcanvas' ), 'add-ons' );

}

// Remove comment and content div for typography page.
beans_remove_action( 'beans_comments_template' );
beans_remove_markup( 'beans_post_content' );

// Remove layout control to force full-width.
add_filter( 'beans_layout', '__return_false' );

// Append typography demo content.
add_action( 'beans_post_body_append_markup', 'example_typography_content' );

function example_typography_content() {

	?>
	<hr class="uk-grid-divider">
	<div class="uk-grid uk-grid-medium">
	    <div class="uk-width-1-1" data-uk-margin>
	        <div class="uk-button-group">
	            <button class="uk-button">Button</button>
	            <div data-uk-dropdown="{mode:'click'}">
	                <button class="uk-button"><i class="uk-icon-caret-down"></i></button>
	                <div class="uk-dropdown uk-dropdown-width-2">
	                    <div class="uk-grid uk-grid-medium uk-dropdown-grid">
	                        <div class="uk-width-1-2">
	                            <ul class="uk-nav uk-nav-dropdown">
	                                <li class="uk-nav-header">Header</li>
	                                <li><a href="#">Item</a></li>
	                                <li><a href="#">Item</a></li>
	                                <li class="uk-nav-divider"></li>
	                                <li><a href="#">Separated item</a></li>
	                                <li class="uk-parent">
	                                    <a href="#">Parent</a>
	                                    <ul class="uk-nav-sub">
	                                        <li><a href="#">Sub item</a>
	                                            <ul>
	                                                <li><a href="#">Sub item</a></li>
	                                            </ul>
	                                        </li>
	                                    </ul>
	                                </li>
	                            </ul>
	                        </div>
	                        <div class="uk-width-1-2">
	                            <ul class="uk-nav uk-nav-dropdown">
	                                <li class="uk-nav-header">Header</li>
	                                <li><a href="#">Item</a></li>
	                                <li><a href="#">Item</a></li>
	                                <li class="uk-nav-divider"></li>
	                                <li><a href="#">Separated item</a></li>
	                                <li class="uk-parent">
	                                    <a href="#">Parent</a>
	                                    <ul class="uk-nav-sub">
	                                        <li><a href="#">Sub item</a>
	                                            <ul>
	                                                <li><a href="#">Sub item</a></li>
	                                            </ul>
	                                        </li>
	                                    </ul>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="uk-button-group">
	            <button class="uk-button uk-button-primary">Primary</button>
	            <div data-uk-dropdown="{mode:'click'}">
	                <button class="uk-button uk-button-primary"><i class="uk-icon-caret-down"></i></button>
	                <div class="uk-dropdown uk-dropdown-small">
	                    <ul class="uk-nav uk-nav-dropdown">
	                        <li class="uk-nav-header">Header</li>
	                        <li><a href="#">Item</a></li>
	                        <li><a href="#">Item</a></li>
	                        <li class="uk-nav-divider"></li>
	                        <li><a href="#">Separated item</a></li>
	                        <li class="uk-parent">
	                            <a href="#">Parent</a>
	                            <ul class="uk-nav-sub">
	                                <li><a href="#">Sub item</a>
	                                    <ul>
	                                        <li><a href="#">Sub item</a></li>
	                                    </ul>
	                                </li>
	                            </ul>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	        <div class="uk-button-group">
	            <button class="uk-button uk-button-success">Success</button>
	            <div data-uk-dropdown="{mode:'click'}">
	                <button class="uk-button uk-button-success"><i class="uk-icon-caret-down"></i></button>
	                <div class="uk-dropdown">
	                    <ul class="uk-nav uk-nav-dropdown">
	                        <li class="uk-nav-header">Header</li>
	                        <li><a href="#">Item</a></li>
	                        <li><a href="#">Item</a></li>
	                        <li class="uk-nav-divider"></li>
	                        <li><a href="#">Separated item</a></li>
	                        <li class="uk-parent">
	                            <a href="#">Parent</a>
	                            <ul class="uk-nav-sub">
	                                <li><a href="#">Sub item</a>
	                                    <ul>
	                                        <li><a href="#">Sub item</a></li>
	                                    </ul>
	                                </li>
	                            </ul>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	        <div class="uk-button-group">
	            <button class="uk-button uk-button-danger">Danger</button>
	            <div data-uk-dropdown="{mode:'click'}">
	                <button class="uk-button uk-button-danger"><i class="uk-icon-caret-down"></i></button>
	                <div class="uk-dropdown">
	                    <ul class="uk-nav uk-nav-dropdown">
	                        <li class="uk-nav-header">Header</li>
	                        <li><a href="#">Item</a></li>
	                        <li><a href="#">Item</a></li>
	                        <li class="uk-nav-divider"></li>
	                        <li><a href="#">Separated item</a></li>
	                        <li class="uk-parent">
	                            <a href="#">Parent</a>
	                            <ul class="uk-nav-sub">
	                                <li><a href="#">Sub item</a>
	                                    <ul>
	                                        <li><a href="#">Sub item</a></li>
	                                    </ul>
	                                </li>
	                            </ul>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	        <button class="uk-button" disabled>Disabled</button>
	        <button class="uk-button" data-uk-tooltip title="Bazinga!">Tooltip</button>
	        <button class="uk-button" data-uk-modal="{target:'#modal-1'}">Modal</button>
	        <button class="uk-button" data-uk-offcanvas="{target:'#offcanvas-1'}">Off-canvas</button>
	        <button class="uk-button uk-button-link">Button link</button>

	    </div>
	</div>
	<hr class="uk-grid-divider">
	<div class="uk-grid uk-grid-medium" data-uk-grid-margin>
	    <div class="uk-width-medium-1-2">
	        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
	            <div class="uk-width-1-1">
	                <article class="uk-article">
	                    <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
	                        <div class="uk-width-1-2 uk-width-medium-1-3">
	                            <span class="uk-text-muted">text-muted</span><br>
	                            <span class="uk-text-primary">text-primary</span><br>
	                            <span class="uk-text-success">text-success</span><br>
	                            <span class="uk-text-warning">text-warning</span><br>
	                            <span class="uk-text-danger">text-danger</span>
	                        </div>
	                        <div class="uk-width-1-2 uk-width-medium-1-3">
	                            <a href="#">a element</a><br>
	                            <em>em element</em><br>
	                            <strong>strong</strong><br>
	                            <code>code element</code><br>
	                            <del>del element</del>
	                        </div>
	                        <div class="uk-width-1-2 uk-width-medium-1-3">
	                            <ins>ins element</ins><br>
	                            <mark>mark element</mark><br>
	                            <q>q <q>inside</q> a q element </q><br>
	                            <abbr title="Abbreviation Element">abbr element</abbr><br>
	                            <dfn title="Defines a definition term">dfn element</dfn>
	                        </div>
	                        <div class="uk-width-1-2 uk-grid-margin">
	                            <h1 class="uk-display-inline">h1</h1>
	                            <h2 class="uk-display-inline">h2</h2>
	                            <h3 class="uk-display-inline">h3</h3>
	                            <h4 class="uk-display-inline">h4</h4>
	                            <h5 class="uk-display-inline">h5</h5>
	                            <h6 class="uk-display-inline">h6</h6>
	                        </div>
	                        <div class="uk-width-medium-1-2 uk-grid-margin">
	                            <blockquote>
	                                <p> Lorem ipsum dolor.</p>
	                                <small>Someone famous</small>
	                            </blockquote>
	                        </div>
	                    </div>
	                </article>
	            </div>
	            <div class="uk-width-1-1 uk-grid-margin">
	                <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
	                    <div class="uk-width-small-1-2">
	                        <ul class="uk-list uk-list-line">
	                            <li>List item 1</li>
	                            <li>List item 2</li>
	                            <li>List item 3</li>
	                        </ul>
	                    </div>
	                    <div class="uk-width-small-1-2">
	                        <ul class="uk-list uk-list-striped">
	                            <li>List item 1</li>
	                            <li>List item 2</li>
	                            <li>List item 3</li>
	                        </ul>
	                    </div>
	                    <div class="uk-width-small-1-2 uk-grid-margin">
	                        <table class="uk-table uk-table-striped uk-table-condensed uk-table-hover">
	                            <caption>Table caption</caption>
	                            <thead>
	                                <tr>
	                                    <th>Table</th>
	                                    <th>Heading</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                                <tr>
	                                    <td>Table</td>
	                                    <td>Data</td>
	                                </tr>
	                                <tr>
	                                    <td>Table</td>
	                                    <td>Data</td>
	                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
	                    <div class="uk-width-small-1-2 uk-grid-margin">
	                        <dl class="uk-description-list uk-description-list-line">
	                            <dt>Description lists</dt>
	                            <dd>Description text.</dd>
	                            <dt>Description lists</dt>
	                            <dd>Description text.</dd>
	                        </dl>
	                    </div>
	                </div>
	            </div>
	            <div class="uk-width-1-1 uk-grid-margin">
	               <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
	                    <div class="uk-width-small-1-2">
	                        <ul class="uk-subnav uk-subnav-line">
	                            <li class="uk-active"><a href="#">Active</a></li>
	                            <li><a href="#">Item</a></li>
	                            <li><span>Disabled</span></li>
	                        </ul>

	                    </div>
	                    <div class="uk-width-small-1-2">

	                        <ul class="uk-subnav uk-subnav-pill">
	                            <li class="uk-active"><a href="#">Active</a></li>
	                            <li><a href="#">Item</a></li>
	                            <li><span>Disabled</span></li>
	                        </ul>

	                    </div>
	                    <div class="uk-width-small-1-2 uk-grid-margin">
	                        <ul class="uk-tab" data-uk-tab>
	                            <li class="uk-active"><a href="#">Active</a></li>
	                            <li><a href="#">Item</a></li>
	                            <li class="uk-disabled"><a href="#">Disabled</a></li>
	                        </ul>
	                    </div>
	                    <div class="uk-width-small-1-2 uk-grid-margin">
	                        <a href="#" class="uk-icon-button uk-icon-github"></a>
	                        <a href="#" class="uk-icon-button uk-icon-twitter"></a>
	                        <a href="#" class="uk-icon-button uk-icon-dribbble"></a>
	                        <a href="#" class="uk-icon-button uk-icon-html5"></a>
	                    </div>
	                </div>
	            </div>
	            <div class="uk-width-1-1 uk-grid-margin">
	                <span class="uk-badge">Badge</span>
	                <span class="uk-badge uk-badge-notification">1</span>
	                <span class="uk-badge uk-badge-success">Success</span>
	                <span class="uk-badge uk-badge-success uk-badge-notification">4</span>
	                <span class="uk-badge uk-badge-warning">Warning</span>
	                <span class="uk-badge uk-badge-warning uk-badge-notification">3</span>
	                <span class="uk-badge uk-badge-danger">Danger</span>
	                <span class="uk-badge uk-badge-danger uk-badge-notification">4</span>
	            </div>
	            <div class="uk-width-1-1 uk-grid-margin">
	                <ul class="uk-breadcrumb">
	                    <li><a href="#">Home</a></li>
	                    <li><a href="#">Blog</a></li>
	                    <li><span>Category</span></li>
	                    <li class="uk-active"><span>Post</span></li>
	                </ul>
	            </div>
	            <div class="uk-width-1-1 uk-grid-margin">
	                <ul class="uk-pagination">
	                    <li class="uk-disabled"><span><i class="uk-icon-angle-double-left"></i></span></li>
	                    <li class="uk-active"><span>1</span></li>
	                    <li><a href="#">2</a></li>
	                    <li><span>...</span></li>
	                    <li><a href="#">20</a></li>
	                    <li><a href="#"><i class="uk-icon-angle-double-right"></i></a></li>
	                </ul>
	            </div>
	        </div>
	    </div>
	    <div class="uk-width-medium-1-2">
	        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
	            <div class="uk-width-small-1-2">
	                <div class="uk-panel">
	                    <h3 class="uk-panel-title">Side Navigation</h3>
	                    <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
	                        <li class="uk-active"><a href="#">Active</a></li>
	                        <li class="uk-parent">
	                            <a href="#">Parent</a>
	                            <ul class="uk-nav-sub">
	                                <li><a href="#">Sub item</a></li>
	                                <li><a href="#">Sub item</a>
	                                    <ul>
	                                        <li><a href="#">Sub item</a></li>
	                                        <li><a href="#">Sub item</a></li>
	                                    </ul>
	                                </li>
	                            </ul>
	                        </li>
	                        <li><a href="#">Item</a></li>
	                    </ul>
	                </div>
	                <div class="uk-panel">
	                    <div class="uk-panel-badge uk-badge">Badge</div>
	                    <h3 class="uk-panel-title">Header</h3>
	                    Lorem ipsum <a href="#">dolor</a> sit amet, consectetur adipisicing elit.
	                </div>
	                <div class="uk-panel uk-panel-header">
	                    <h3 class="uk-panel-title">Divider</h3>
	                    Lorem ipsum <a href="#">dolor</a> sit amet, consectetur adipisicing elit.
	                </div>
	            </div>
	            <div class="uk-width-small-1-2">
	                <div class="uk-panel uk-panel-box">
	                    <h3 class="uk-panel-title">Box</h3>
	                    Lorem ipsum <a href="#">dolor</a> sit amet, consectetur adipisicing elit.
	                </div>
	                <div class="uk-panel uk-panel-box uk-panel-box-primary">
	                    <h3 class="uk-panel-title">Box primary</h3>
	                    Lorem ipsum <a href="#">dolor</a> sit amet, consectetur adipisicing elit.
	                </div>
	                <div class="uk-panel uk-panel-box uk-panel-box-secondary">
	                    <h3 class="uk-panel-title">Box secondary</h3>
	                    Lorem ipsum <a href="#">dolor</a> sit amet, consectetur adipisicing elit.
	                </div>
	            </div>
	        </div>
	        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
	            <div class="uk-width-small-1-2">
	                <div class="uk-alert" data-uk-alert>
	                    <a class="uk-alert-close uk-close"></a>
	                    <p>Info message</p>
	                </div>
	            </div>
	            <div class="uk-width-small-1-2">
	                <div class="uk-alert uk-alert-success" data-uk-alert>
	                    <a class="uk-alert-close uk-close"></a>
	                    <p>Success message</p>
	                </div>
	            </div>
	            <div class="uk-width-small-1-2 uk-grid-margin">
	                <div class="uk-alert uk-alert-warning" data-uk-alert>
	                    <a class="uk-alert-close uk-close"></a>
	                    <p>Warning message</p>
	                </div>
	            </div>
	            <div class="uk-width-small-1-2 uk-grid-margin">
	                <div class="uk-alert uk-alert-danger" data-uk-alert>
	                    <a class="uk-alert-close uk-close"></a>
	                    <p>Danger message</p>
	                </div>
	            </div>
	            <div class="uk-width-small-1-2 uk-grid-margin">
	                <div class="uk-progress">
	                    <div class="uk-progress-bar" style="width: 55%;">55%</div>
	                </div>
	            </div>
	            <div class="uk-width-small-1-2 uk-grid-margin">
	                <div class="uk-progress uk-progress-success">
	                    <div class="uk-progress-bar" style="width: 55%;">55%</div>
	                </div>
	            </div>
	            <div class="uk-width-small-1-2 uk-grid-margin">
	                <div class="uk-progress uk-progress-warning">
	                    <div class="uk-progress-bar" style="width: 55%;">55%</div>
	                </div>
	            </div>
	            <div class="uk-width-small-1-2 uk-grid-margin">
	                <div class="uk-progress uk-progress-danger">
	                    <div class="uk-progress-bar" style="width: 55%;">55%</div>
	                </div>
	            </div>
	            <div class="uk-width-small-1-2 uk-form uk-grid-margin">
	                <fieldset>
	                    <legend>Form states</legend>
	                    <div class="uk-form-row">
	                        <input type="text" placeholder="Text Input" class="uk-width-1-1">
	                    </div>
	                    <div class="uk-form-row">
	                        <input type="text" placeholder="form-success" value="form-success" class="uk-width-1-1 uk-form-success">
	                    </div>
	                    <div class="uk-form-row">
	                        <input type="text" placeholder="form-danger" value="form-danger" class="uk-width-1-1 uk-form-danger">
	                    </div>
	                    <div class="uk-form-row">
	                        <input type="text" placeholder="form disabled" class="uk-width-1-1" disabled>
	                    </div>
	                </fieldset>
	            </div>
	            <div class="uk-width-small-1-2 uk-form uk-grid-margin">
	                <fieldset>
	                    <legend>Form styles</legend>
	                    <div class="uk-form-row">
	                        <input type="text" placeholder="form-large" class="uk-form-large uk-width-1-1">
	                    </div>
	                    <div class="uk-form-row">
	                        <input type="text" placeholder="form-small" class="uk-form-small uk-width-1-1">
	                    </div>
	                    <div class="uk-form-row">
	                        <input type="text" placeholder="form-blank" class="uk-form-blank uk-width-1-1">
	                    </div>
	                </fieldset>
	            </div>
	        </div>
	    </div>
	</div>
	<div id="offcanvas-1" class="uk-offcanvas">
	    <div class="uk-offcanvas-bar">
	        <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
	            <li><a href="#">Item</a></li>
	            <li class="uk-active"><a href="#">Active</a></li>
	            <li class="uk-parent">
	                <a href="#">Parent</a>
	                <ul class="uk-nav-sub">
	                    <li><a href="#">Sub item</a></li>
	                    <li><a href="#">Sub item</a>
	                        <ul>
	                            <li><a href="#">Sub item</a></li>
	                            <li><a href="#">Sub item</a></li>
	                        </ul>
	                    </li>
	                </ul>
	            </li>
	            <li class="uk-parent">
	                <a href="#">Parent</a>
	                <ul class="uk-nav-sub">
	                    <li><a href="#">Sub item</a></li>
	                    <li><a href="#">Sub item</a></li>
	                </ul>
	            </li>
	            <li><a href="#">Item</a></li>
	            <li class="uk-nav-header">Header</li>
	            <li><a href="#"><i class="uk-icon-star"></i> Item</a></li>
	            <li><a href="#"><i class="uk-icon-twitter"></i> Item</a></li>
	            <li class="uk-nav-divider"></li>
	            <li><a href="#"><i class="uk-icon-rss"></i> Item</a></li>
	        </ul>
	        <div class="uk-panel">
	            <h3 class="uk-panel-title">Title</h3>
	            Lorem ipsum dolor sit amet, <a href="#">consetetur</a> sadipscing elitr.
	        </div>
	        <div class="uk-panel">
	            <h3 class="uk-panel-title">Title</h3>
	            Lorem ipsum dolor sit amet, <a href="#">consetetur</a> sadipscing elitr.
	        </div>
	    </div>
	</div>
	<div id="modal-1" class="uk-modal">
	    <div class="uk-modal-dialog">
	        <button type="button" class="uk-modal-close uk-close"></button>
	        <h1>Headline</h1>
	        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	    </div>
	</div>
	<?php

}

// Load document which is always needed at the bottom of template files.
beans_load_document();