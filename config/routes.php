<?php

use shop\Router;

Router::addRoutes('^admin/?$', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'admin',]);
Router::addRoutes('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['admin_prefix' => 'admin',]);

Router::addRoutes('^product/(?P<slug>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);

Router::addRoutes('^$', ['controller' => 'Main', 'action' => 'index',]);
Router::addRoutes('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$');
