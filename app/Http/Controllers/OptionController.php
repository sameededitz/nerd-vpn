<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function Options()
    {
        $vpn_timeout = Option::where('key', 'vpn_timeout')->value('value') ?? '';

        $privacyPolicyContent = Option::where('key', 'privacy_policy')->value('value') ?? '';
        $tosContent = Option::where('key', 'tos')->value('value') ?? '';
        return view('admin.all-options', compact('privacyPolicyContent', 'tosContent', 'vpn_timeout'));
    }

    public function saveInfo(Request $request)
    {
        $request->validate([
            'vpn_timeout' => 'required|integer|min:1',
        ]);

        Option::updateOrCreate(
            ['key' => 'vpn_timeout'],
            ['value' => $request->input('vpn_timeout')]
        );

        return redirect()->back()->with([
            'success' => 'success',
            'message' => 'Options saved successfully',
        ]);
    }

    public function saveOptions(Request $request)
    {
        $request->validate([
            'privacy_policy' => 'required',
            'tos' => 'required',
        ]);

        // Save the content to the database or file system
        Option::updateOrCreate(
            ['key' => 'privacy_policy'],
            ['value' => $request->input('privacy_policy')]
        );

        Option::updateOrCreate(
            ['key' => 'tos'],
            ['value' => $request->input('tos')]
        );

        return redirect()->back()->with([
            'success' => true,
            'message' => 'Options saved successfully',
        ]);
    }

    public function getOptions()
    {
        // Retrieve the current content of the Privacy Policy and Terms of Service
        $privacyPolicyContent = Option::where('key', 'privacy_policy')->value('value') ?? '';
        $tosContent = Option::where('key', 'tos')->value('value') ?? '';

        $vpn_timeout = Option::where('key', 'vpn_timeout')->value('value') ?? '';

        // Return the content as JSON
        return response()->json([
            'privacy_policy' => $privacyPolicyContent,
            'tos' => $tosContent,
            'vpn_timeout' => $vpn_timeout,
        ]);
    }
}
