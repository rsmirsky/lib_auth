<?php


Route::get('/', 'AuthorController@index')->name('books.index');


Route::get('/library/{book}/edit', 'AuthorController@edit')->name('books.edit');

Route::patch('/library/{book}', 'AuthorController@update')->name('books.update');

Route::delete('/library/{book}', 'AuthorController@destroy')->name('books.destroy');



