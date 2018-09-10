<?php



Route::pattern('slug','(.*)');
//Route::pattern('rowId','(.*)');
Route::pattern('id','([0-9]*)');
// cai route sai cho nao no bao thieu thasm so nua

//ROute Login
//Route::group(['namespace'=>'Auth'],function (){
//    Route::get('login',[
//        'uses'=>'AuthController@getLogin',
//        'as'=>'auth.auth.login'
//    ]);
//    Route::post('login',[
//        'uses'=>'AuthController@postLogin',
//        'as'=>'auth.auth.login'
//    ]);
//    Route::get('logout',[
//        'uses'=>'AuthController@logOut',
//        'as'=>'auth.auth.logout'
//    ]);

//    Route::get('noaccess',function (){
//        return view('auth.noaccess');
//    });
//});

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'role:1|2|3'],function (){


    route::get('',[
        'uses'=>'IndexController@index',
        'as'=>'admin.index.index',
    ]);
    Route::group(['prefix'=>'statistical'],function (){
        route::get('',[
            'uses'=>'StatisticalController@countProducts',
            'as'=>'admin.statistical.index',
        ]);
    });
    Route::group(['prefix'=>'subscribe'],function (){
         route::get('',[
        'uses'=>'SubscribeController@index',
        'as'=>'admin.sub.index',
        ]);
    });
   
    Route::group(['prefix'=>'ajax'],function (){
//        Route::get('loaitin/{idTheloai}','AjaxController@getLoaitin');
        route::get('loaitin/',[
            'uses'=>'AjaxController@getLoaitin',
            'as'=>'admin.ajax.ajax',
        ]);
    });
   Route::group(['prefix'=>'products'],function(){
       route::get('',[
           'uses'=>'ProductsController@index',
           'as'=>'admin.products.index',
       ]);
//       Route::get('edit/{id}',[
//           'uses'=>'ProductsController@edit',
//           'as'=>'admin.products.edit'
//       ]);
       Route::post('edit/{id?}',[
           'uses'=>'ProductsController@update',
           'as'=>'admin.products.update'
       ]);
//       Route::get('add',[
//           'uses'=>'ProductsController@create',
//           'as'=>'admin.products.create'
//       ]);
       Route::post('add',[
           'uses'=>'ProductsController@store',
           'as'=>'admin.products.store'
       ]);
       Route::post('dell/{id}',[
           'uses'=>'ProductsController@destroy',
           'as'=>'admin.products.destroy',
       ]);
    });
    Route::group(['prefix'=>'bills'],function (){
        route::get('',[
            'uses'=>'OrdersController@index',
            'as'=>'admin.orders.index',
        ]);
        route::get('showdetail',[
            'uses'=>'OrdersController@showDetail',
            'as'=>'admin.orders.show',
        ]);
        route::get('showdata',[
            'uses'=>'OrdersController@showData',
            'as'=>'admin.orders.data',
        ]);
        route::post('hello',[
            'uses'=>'OrdersController@active',
            'as'=>'admin.orders.ok',
        ]);
        route::post('dell/{id}',[
            'uses'=>'OrdersController@destroy',
            'as'=>'admin.orders.destroy',
        ]);
        route::post('active_order',[
            'uses'=>'OrdersController@active',
            'as'=>'admin.orders.active'
        ]);
    });
    Route::group(['prefix'=>'review'],function (){
//        Route::get('loaitin/{idTheloai}','AjaxController@getLoaitin');
        route::get('',[
            'uses'=>'ReviewController@index',
            'as'=>'admin.review.index',
        ]);
        route::get('active',[
            'uses'=>'ReviewController@active',
            'as'=>'admin.review.active',
        ]);
        route::post('dell/{id}',[
            'uses'=>'ReviewController@destroy',
            'as'=>'admin.review.destroy',
        ]);
    });
    Route::group(['prefix'=>'typeproducts','middleware'=>'role:1|2'],function(){
        route::get('',[
            'uses'=>'TypeProductsController@index',
            'as'=>'admin.typeproducts.index',
        ]);
        Route::post('addtype',[
            'uses'=>'TypeProductsController@store',
            'as'  =>'admin.typeproducts.store'
        ]);
        Route::post('del/{id}',[
            'uses'=>'TypeProductsController@destroy',
            'as'=>'admin.typeproducts.destroy',
        ]);
//        Route::get('edit/{id}',[
//            'uses'=>'TypeProductsController@edit',
//            'as'=>'admin.typeproducts.edit',
//        ]);
        Route::post('edit/{id?}',[
            'uses'=>'TypeProductsController@update',
            'as'=>'admin.typeproducts.update',
        ]);

    });
    Route::group(['prefix'=>'contacts'],function(){
        route::get('',[
            'uses'=>'ContactsController@contacts',
            'as'=>'admin.contacts.contacts',
        ]);
        route::post('read/',[
            'uses'=>'ContactsController@loadAjax',
            'as'=>'admin.ajax.load',
        ]);
        route::post('load/',[
            'uses'=>'ContactsController@read',
            'as'=>'admin.contacts.dread',
        ]);
        route::get('send/{id}',[
            'uses'=>'ContactsController@send',
            'as'=>'admin.contacts.read',
        ]);
        route::get('fuck',[
            'uses'=>'ContactsController@sendMail',
            'as'=>'admin.contacts.fuck',
        ]);
        route::post('tick',[
            'uses'=>'ContactsController@tick',
            'as'=>'admin.contacts.tick',
        ]);
        route::get('dell/{id}',[
            'uses'=>'ContactsController@dell',
            'as'=>'admin.contacts.dell',
        ]);
        route::get('bin',[
            'uses'=>'ContactsController@bin',
            'as'=>'admin.contacts.bin',
        ]);
        route::get('back/{id}',[
            'uses'=>'ContactsController@back',
            'as'=>'admin.contacts.back',
        ]);
        route::get('focus_dell/{id}',[
            'uses'=>'ContactsController@focusDell',
            'as'=>'admin.contacts.focusDell',
        ]);



    });



    Route::group(['prefix'=>'producer','middleware'=>'role:1|2'],function(){
        route::get('',[
            'uses'=>'ProducerController@index',
            'as'=>'admin.producer.index',
        ]);
        Route::post('del/{id}',[
            'uses'=>'ProducerController@destroy',
            'as'=>'admin.producer.destroy',
        ]);
        Route::post('add',[
            'uses'=>'ProducerController@store',
            'as'  =>'admin.producer.store'
        ]);
//        Route::get('edit/{id}',[
//            'uses'=>'ProducerController@edit',
//            'as'=>'admin.producer.edit',
//        ]);
        Route::post('edit/{id}',[
            'uses'=>'ProducerController@update',
            'as'=>'admin.producer.update',
        ]);


    });

    Route::group(['prefix'=>'user'],function(){
        Route::get('add/check-email')->name('admin.user.AjaxCheckEmail')
            ->uses('UserController@AjaxCheckEmail');
        route::get('',[
            'uses'=>'UserController@index',
            'as'=>'admin.user.index',
        ]);
        Route::post('add',[
            'uses'=>'UserController@store',
            'as'  =>'admin.user.store'
        ]);
//        Route::get('add',[
//            'uses'=>'UserController@create',
//            'as'  =>'admin.user.create'
//        ]);
        Route::post('del/{id}',[
            'uses'=>'UserController@destroy',
            'as'=>'admin.user.destroy',
        ]);
//        Route::get('edit/{id}',[
//            'uses'=>'UserController@edit',
//            'as'=>'admin.user.edit',
//        ]);
        Route::post('edit/{id?}',[
            'uses'=>'UserController@update',
            'as'=>'admin.user.update',
        ]);

    });
    Route::group(['prefix'=>'account'],function (){
        Route::get('',[
            'uses'=>'AccountController@index',
            'as'=>'admin.account.account'
        ]);
        Route::get('dell/{id}',[
            'uses'=>'AccountController@destroy',
            'as'=>'admin.account.destroy',
        ]);
    });

});

use App\Model\Products;
Route::group(['namespace'=>'Shop'],function (){



    route::post('ajax/',[
        'uses'=>'ProductsController@ajax',
        'as'=>'shop.products.ajax_product',
    ]);
//    route::get('ajax/products',function (){
//        $arItems=Products::paginate(8);
//        return view('shop.products.index',['arItems'=>$arItems]);
//    }

//    );
    route::get('district/',[
        'uses'=>'AjaxController@getDistrict',
        'as'=>'shop.ajax.ajax',
    ]);
    route::get('ward/',[
        'uses'=>'AjaxController@getWard',
        'as'=>'shop.ajax.ward',
    ]);
    Route::get('sub',[
        'uses'=>'SubscribeController@sub',
        'as'  =>'shop.sub'
    ]);
    Route::post('review',[
        'uses'=>'ProductsController@review',
        'as'=>'shop.products.review'
    ]);
    Route::get('contact',[
        'uses'=>'ContactController@getContact',
        'as'=>'shop.contact.contact'
    ]);
    Route::post('contact',[
        'uses'=>'ContactController@postContact',
        'as'=>'shop.contact.contact'
    ]);
    Route::get('logOutList',[
        'uses'=>'LoginPubController@logOutList',
        'as'=>'shop.shop.logout'
    ]);
    Route::get('{slug}-{id}',[
        'uses'=>'ProductsController@index',// day dung ko yes
        'as'  =>'shop.products.index'
    ]);
    Route::get('',[
        'uses'=>'IndexController@index',
        'as'  =>'shop.index.index'
    ]);
    Route::get('{slug}-{id}.html',[
        'uses'=>'ProductsController@detail',
        'as'  =>'shop.products.detail'
    ]);
    Route::get('register',[
        'uses'=>'RegisterController@getRegister',
        'as'  =>'shop.register.index'
    ]);
    Route::get('register/check-email')->name('shop.register.AjaxCheckEmail')
    ->uses('RegisterController@AjaxCheckEmail');
    Route::post('register',[
        'uses'=>'RegisterController@postRegister', // day ma
        'as'  =>'shop.register.index'
    ]);
    Route::get('hi',[
        'uses'=>'LoginPubController@getLoginPublic',
        'as'=>'shop.login.login'
    ]);
    Route::post('hi',[
        'uses'=>'LoginPubController@postLoginPublic',
        'as'=>'shop.login.login'
    ]);

    Route::group(['prefix'=>'cart'],function(){
        Route::get('Cart_detail',[
            'uses'=>'CartController@giohang',
            'as'=>'shop.cart.index'
        ]);
        Route::get('/add',[
            'uses'=>'CartController@cart',
            'as'=>'shop.cart.cart'
        ]);
        Route::get('/delete/{rowId}',[
            'uses'=>'CartController@delete',
            'as'=>'shop.cart.delete'
        ]);
        Route::post('update-cart',[
            'uses'=>'CartController@capnhat',
            'as'=>'shop.cart.update'
        ]);
        Route::group(['prefix'=>'checkout'],function(){
            Route::get('',[
                'uses'=>'CartController@checkout',
                'as'=>'shop.cart.checkout'
            ]);
            Route::post('order',[
                'uses'=>'CartController@order',
                'as'=>'shop.cart.order'
            ]);
        });
    });
    Route::group(['prefix'=>'search'],function (){
        Route::get('',[
            'uses'=>'SearchController@search',
            'as'=>'shop.search.search'
        ]);
    });


});

Route::get('/facebook/redirect', 'Auth\SocialController@redirectToProvider');
Route::get('/facebook/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('noaccess',function (){
    return view('admin.error.404');
});
//Auth::routes();
//
////Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('facebook/redirect', 'Auth\SocialController@redirectToProvider');
Route::get('facebook/callback', 'Auth\SocialController@handleProviderCallback');

Route::get('google/redirect', 'Auth\SocialController@redirectToProviderGoogle');
Route::get('google/callback', 'Auth\SocialController@handleProviderCallbackGoogle');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
