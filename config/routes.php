<?php

use shop\Router;

Router::addRoutes('^admin/?$', ['controller' => 'Main', 'action' => 'index', 'admin_prefix' => 'admin',]);
Router::addRoutes('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['admin_prefix' => 'admin',]);

Router::addRoutes('^(?P<lang>[a-z]+)?/?product/(?P<slug>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);

Router::addRoutes('^(?P<lang>[a-z]+)?/?$', ['controller' => 'Main', 'action' => 'index',]);
Router::addRoutes('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$');
