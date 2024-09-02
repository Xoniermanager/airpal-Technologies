<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiteConfigRequest;

class AdminSiteConfigController extends Controller
{
    
    public function addWebsiteConfig(SiteConfigRequest $request)
    {
        // Get the validated configurations
        $configs = $request->validated();
        $results = [];
    
        // Loop through each configuration item
        foreach ($configs as $config) {
            // Extract the name and value for convenience
            $name  = $config['name'];
            $value = $config['value'];
    
            // Find the existing configuration by name
            $existingConfig = SiteConfig::where('name', $name)->first();
    
            // Prepare data for update or create
            $data = [
                'name' => $name,
                'value' => $value,
            ];
    
            // Check if the value is an uploaded file
            if ($value instanceof \Illuminate\Http\UploadedFile) {
                // Check if there is an existing configuration with a file
                if ($existingConfig && $existingConfig->value) {
                    // Delete the existing file
                    $existingFilePath = storage_path('app/' . $existingConfig->value);
                    if (file_exists($existingFilePath)) {
                        unlink($existingFilePath);
                    }
                }
                $data['value'] = uploadingImageorFile($value, 'siteImages', $data['name']);
            }
    
            if ($existingConfig) {
                // Update the existing configuration
                $existingConfig->update($data);
                $results[] = $existingConfig;
            } else {
                // Create a new configuration entry
                $newConfig = SiteConfig::create($data);
                $results[] = $newConfig;
            }
        }
    
        // Return a success response
        return response()->json(['status' => true, 'message' => 'Website configurations have been saved successfully.', 'data' => $results]);
    }

public function settings()
{
    $configs = SiteConfig::all();

    $configData = [];
    foreach ($configs as $config) {
        $configData[$config->name] = $config->value;
    }

    // Pass the configurations to the view
    return view('admin.settings', ['configData' => $configData]);
}

    
    
}
