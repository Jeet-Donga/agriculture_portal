<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//user side routes
$route['home'] = 'Pages/index';
$route['about-us'] = 'Pages/about';
$route['contact-us'] = 'Pages/contact';
$route['faqs'] = 'Pages/faq1';
$route['login'] = 'Pages/log';
$route['privacy-policy'] = 'Pages/privacy';
$route['register'] = 'Pages/reg';
$route['return-refund-policy'] = 'Pages/ret_ref';
$route['suggest-us'] = 'Pages/suggest';
$route['term-and-conditions'] = 'Pages/term';
$route['forgot-password'] = 'Pages/fpwd';
$route['product-list'] = 'Pages/product_list';
$route['product-list/(:any)/(:any)'] = 'Pages/product_list/$2/$3';
$route['product-detail/(:num)'] = 'Pages/product_detail/$2';
$route['product-detail'] = 'Pages/product_detail';
$route['view-cart'] = 'Pages/view_cart';
$route['checkout'] = 'Pages/checkout';
$route['order-success'] = 'Pages/order_success';



//admin side routes
$route['admin-authentication'] = 'Authorize/index';
$route['admin-authentication/(:num)'] = 'Authorize/index/$2';
$route['admin-forget-password'] = 'Authorize/forget_password';
$route['admin-logout'] = 'Authorize/logout';
$route['admin-dashboard'] = 'Authorize/manage_dashboard';
$route['manage-contact-us'] = 'Authorize/manage_contact';
$route['manage-banner'] = 'Authorize/manage_bann';
$route['manage-email-subscriber'] = 'Authorize/manage_emailsub';
$route['manage-feedback'] = 'Authorize/manage_feedback';
$route['manage-city'] = 'Authorize/manage_city';
$route['edit-city/(:any)'] = 'edit/city/$2';
$route['manage-state'] = 'Authorize/manage_state';
$route['edit-state/(:any)'] = 'edit/state/$2';
$route['manage-member'] = 'Authorize/manage_member';
$route['manage-seller'] = 'Authorize/manage_seller';
$route['manage-main-category'] = 'Authorize/manage_main';
$route['edit-maincategory/(:any)'] = 'edit/maincategory/$2';
$route['manage-sub-category'] = 'Authorize/manage_sub';
$route['edit-subcategory/(:any)'] = 'edit/subcategory/$2';
$route['edit-petacategory/(:any)'] = 'edit/petacategory/$2';
$route['manage-peta-category'] = 'Authorize/manage_peta';
$route['manage-product-detail'] = 'Authorize/manage_pdetail';
$route['manage-product-review'] = 'Authorize/manage_preview';
$route['manage-offer'] = 'Authorize/manage_offer';
$route['manage-promocode'] = 'Authorize/manage_promocode';
$route['manage-profit-rate'] = 'Authorize/manage_profit';
$route['manage-setting'] = 'Authorize/manage_setting';
$route['delete/(:any)/(:any)']='Authorize/delete/$2/$3';
$route['view-bill'] = 'Authorize/view_bill';



//seller
$route['seller-registration-1'] = 'Seller/seller_panel';
$route['seller-registration-2'] = 'Seller/seller_panel2';
$route['seller-registration-3'] = 'Seller/seller_panel3';
$route['seller-registration-4'] = 'Seller/seller_panel4';
$route['seller-forget-password'] = 'Seller/seller_forgetpassword';


//adminseller
$route['seller-dashboard'] = 'Selleradmin/seller_dashboard';
$route['seller-logout'] = 'Selleradmin/logout';
$route['seller-profile'] = 'Selleradmin/sellerprofile';
$route['seller-update-profile'] = 'Selleradmin/seller_updateprofile';
$route['seller-add-new-product'] = 'Selleradmin/seller_add_newproduct';
$route['seller-view-product'] = 'Selleradmin/seller_viewproduct';
$route['seller-change-password'] = 'Selleradmin/seller_changepassword';


//member
$route['member-dashboard'] = 'Member/member_dashboard';
$route['member-profile'] = 'Member/member_profile';
$route['member-update-profile'] = 'Member/member_updateprofile';
$route['member-address'] = 'Member/member_address';
$route['member-wishlist'] = 'Member/member_wishlist';
$route['member-logout'] = 'Member/member_logout';
$route['member-change-password'] = 'Member/member_change_password';
$route['member-review'] = 'Member/member_review';
$route['member-mybill'] = 'Member/member_mybill';
