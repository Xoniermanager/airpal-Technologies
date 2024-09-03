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

        foreach ($configs['config'] as $config) {
            $name  = $config['name'];
            $value = $config['value'] ?? '';

            $existingConfig = SiteConfig::where('name', $name)->first();

            if(in_array($name , ['website_logo','website_favicon']))
            {
                $data['name'] = $name;
                if ($value instanceof \Illuminate\Http\UploadedFile)
                {
                    if ($existingConfig && $existingConfig->value) 
                    {
                        // Delete the existing file
                        unlinkFileOrImage($existingConfig->value);
                    }
                    $data['value'] = uploadingImageorFile($value, 'siteImages', $data['name']);
                }
            }
            else
            {
                $data = [
                    'name' => $name,
                    'value' => $value,
                ];
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

        return response()->json(['status' => true, 'message' => 'Website configurations have been saved successfully.', 'data' => $results]);
    }

    public function settings()
    {
        $configs = SiteConfig::all();

        $configData = [];
        foreach ($configs as $config) {
            if ($config->name == 'website_logo' || $config->name == 'website_favicon') {
                $configData[$config->name] = url('storage/' . $config->value);
            } else {
                $configData[$config->name] = $config->value;
            }
        }
        return view('admin.settings', ['configData' => $configData]);
    }
}
