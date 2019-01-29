<?php namespace Application\WebAdmin\Page;


use Eternity\Response\Responder\SmartPageResponder;

/**
 * @css /dist/admin/style.css
 * @js  /dist/admin/app.js
 * @title Admin
 * @bodyclass login
 * @template "@webadmin/Login.twig"
 */
class Login extends SmartPageResponder {}