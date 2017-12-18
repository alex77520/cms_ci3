
<!--Menu Superior-->
<nav class="navbar navbar-inverse">
    <div class="container-fluid" style="background-color: #b2223c;">
    <?php echo $this->multi_menu_top->render(array(
        'nav_tag_open'        => '<ul class="nav navbar-nav">',            
        'parentl1_tag_open'   => '<li class="dropdown">',
        'parentl1_anchor'     => '<a tabindex="0" data-toggle="dropdown" href="%s">%s<span class="caret"></span></a>',
        'parent_tag_open'     => '<li class="dropdown-submenu">',
        'parent_anchor'       => '<a href="%s" data-toggle="dropdown">%s</a>',
        'children_tag_open'   => '<ul class="dropdown-menu">',
        'item_active'         => 'Item-0'
    )); ?>
    
    </div>
</nav>