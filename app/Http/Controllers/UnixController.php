<?php namespace App\Http\Controllers;

use Request;
use Response;

class UnixController extends Controller {
    
    // Find the permissions value for the 'Special Bits' category.
    private function setSpecialBits() {
        if (Request::has("include-setuid") && Request::input("include-setuid") === "true") { $permissionSetuid = 4; } else { $permissionSetuid = 0; }
        if (Request::has("include-setgid") && Request::input("include-setgid") === "true") { $permissionSetgid = 2; } else { $permissionSetgid = 0; }
        if (Request::has("include-sticky") && Request::input("include-sticky") === "true") { $permissionSticky = 1; } else { $permissionSticky = 0; }
        return $permissionSetuid + $permissionSetgid + $permissionSticky;
    }
    
    // Find the permissions value for the 'User' category.
    private function setUser() {
        if (Request::has("include-user-read") && Request::input("include-user-read") === "true") { $permissionRead = 4; } else { $permissionRead = 0; }
        if (Request::has("include-user-write") && Request::input("include-user-write") === "true") { $permissionWrite = 2; } else { $permissionWrite = 0; }
        if (Request::has("include-user-execute") && Request::input("include-user-execute") === "true") { $permissionExecute = 1; } else { $permissionExecute = 0; }
        return $permissionRead + $permissionWrite + $permissionExecute;
    }
    
    // Find the permissions value for the 'Group' category.
    private function setGroup() {
        if (Request::has("include-group-read") && Request::input("include-group-read") === "true") { $permissionRead = 4; } else { $permissionRead = 0; }
        if (Request::has("include-group-write") && Request::input("include-group-write") === "true") { $permissionWrite = 2; } else { $permissionWrite = 0; }
        if (Request::has("include-group-execute") && Request::input("include-group-execute") === "true") { $permissionExecute = 1; } else { $permissionExecute = 0; }
        return $permissionRead + $permissionWrite + $permissionExecute;
    }
    
    // Find the permissions value for the 'Other' category.
    private function setOther() {
        if (Request::has("include-other-read") && Request::input("include-other-read") === "true") { $permissionRead = 4; } else { $permissionRead = 0; }
        if (Request::has("include-other-write") && Request::input("include-other-write") === "true") { $permissionWrite = 2; } else { $permissionWrite = 0; }
        if (Request::has("include-other-execute") && Request::input("include-other-execute") === "true") { $permissionExecute = 1; } else { $permissionExecute = 0; }
        return $permissionRead + $permissionWrite + $permissionExecute;
    }
    
    // Main function to find the requested permissions.
    public function getUnixPermissions() {
        
        // Find the permissions.
        $permissions = self::setSpecialBits() . self::setUser() . self::setGroup() . self::setOther();
        
        // Return the permissions in a JSON object.
        return Response::json(array("permissions" => $permissions));
    }
}