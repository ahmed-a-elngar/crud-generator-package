<?php
    namespace App\Traits;

    trait ResponseTrait{

        public function sendResponse($msg, $results = [])
        {
            return response()->json([
                'status'    =>      true,
                'message'   =>      $msg,
                'data'      =>      $results
            ], 200);
        }
    
        public function sendError($msg, $errors = [], $ststusCode = 404)
        {
            return response()->json([
                'status'    =>      false,
                'message'   =>      $msg,
                'errors'   =>      $errors
            ], $ststusCode);
        }

    }