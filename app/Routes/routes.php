<?php

return [
   'GET' => [
      // resource => [Class, 'method']
      '/' =>          [ App\Http\Controllers\ThreadController::class, 'index' ],
      'thread' =>     [ App\Http\Controllers\ThreadController::class, 'show' ],    // Requires ID as parameter in URI
      'threads' =>    [ App\Http\Controllers\ThreadController::class, 'index' ],
      'topic' =>      [ App\Http\Controllers\TopicController::class, 'show' ],     // Requires ID as parameter in URI
      'topics' =>     [ App\Http\Controllers\TopicController::class, 'index' ],
      'reply' =>      [ App\Http\Controllers\ReplyController::class, 'show' ],     // Requires ID as parameter in URI
      'replies' =>    [ App\Http\Controllers\ReplyController::class, 'index' ]
   ],
   // Create
   'POST' => [
      'thread' =>     [ App\Http\Controllers\ThreadController::class, 'create' ],
      'topic' =>      [ App\Http\Controllers\TopicController::class, 'create' ],
      'reply' =>      [ App\Http\Controllers\ReplyController::class, 'create' ],
   ],
   // Update
   'PUT' => [
      'thread' =>     [ App\Http\Controllers\ThreadController::class, 'update' ],  // Requires ID as parameter in URI
      'topic' =>      [ App\Http\Controllers\TopicController::class, 'update' ],   // Requires ID as parameter in URI
      'reply'  =>     [ App\Http\Controllers\ReplyController::class, 'update' ],   // Requires ID as parameter in URI
   ],
   // Update
   'PATCH' => [

   ],
   // Delete
   'DELETE' => [
      'thread' =>     [ App\Http\Controllers\ThreadController::class, 'destroy' ], // Requires ID as parameter in URI
      'topic' =>      [ App\Http\Controllers\TopicController::class, 'destroy' ],
      'reply' =>      [ App\Http\Controllers\ReplyController::class, 'destroy' ],
   ]
];