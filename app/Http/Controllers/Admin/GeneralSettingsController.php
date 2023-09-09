<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GeneralSettingsController extends Controller
{
    public function smtp_settings()
    {
        return view('admin.general_settings.smtp_settings');
    }

    public function update_smtp_settings(Request $request)
    {
        $this->validate($request, [
            'site_smtp_mail_host' => 'required|string',
            'site_smtp_mail_port' => 'required|string',
            'site_smtp_mail_username' => 'required|string',
            'site_smtp_mail_password' => 'required|string',
            'site_smtp_mail_encryption' => 'required|string',
            'site_smtp_mail_address' => 'required|string'
        ]);

        update_static_option('site_smtp_mail_host', $request->site_smtp_mail_host);
        update_static_option('site_smtp_mail_port', $request->site_smtp_mail_port);
        update_static_option('site_smtp_mail_username', $request->site_smtp_mail_username);
        update_static_option('site_smtp_mail_password', $request->site_smtp_mail_password);
        update_static_option('site_smtp_mail_encryption', $request->site_smtp_mail_encryption);
        update_static_option('site_smtp_mail_address', $request->site_smtp_mail_address);

        setEnvValue([
            'MAIL_HOST' => $request->site_smtp_mail_host,
            'MAIL_PORT' => $request->site_smtp_mail_port,
            'MAIL_USERNAME' => $request->site_smtp_mail_username,
            'MAIL_PASSWORD' => $request->site_smtp_mail_password,
            'MAIL_ENCRYPTION' => $request->site_smtp_mail_encryption,
            'MAIL_ENCRYPTION' => $request->site_smtp_mail_address
        ]);

        Session::flash('success_message', 'Great! SMTP Setting has been saved successfully!');
        return redirect()->back();
    }

    public function site_identity()
    {
        return view('admin.general_settings.site_identity');
    }

    public function update_site_identity(Request $request)
    {
        $this->validate($request, [
            'site_logo' => 'nullable|string|max:191',
            'site_favicon' => 'nullable|string|max:191',
            'site_white_logo' => 'nullable|string|max:191',
        ]);
        update_static_option('site_logo', $request->site_logo);
        update_static_option('site_favicon', $request->site_favicon);
        update_static_option('site_white_logo', $request->site_white_logo);

        Session::flash('success_message', 'Great! Site Setting has been saved successfully!');
        return redirect()->back();
    }
   public function pdf(){
        return view('admin.general_settings.pdf');
   }
   public function slider()
    {
        return view('admin.general_settings.slider');
    }

    public function update_slider(Request $request)
    {
        $this->validate($request, [
            'slider_heading_one' => 'required|string',
            'slider_heading_two' => 'required|string',
            'slider_btn_txt' => 'required|string',
            'slider_background_image' => 'required|string|max:191',
        ]);
        update_static_option('slider_heading_one', $request->slider_heading_one);
        update_static_option('slider_heading_two', $request->slider_heading_two);
        update_static_option('slider_btn_txt', $request->slider_btn_txt);
        update_static_option('slider_background_image', $request->slider_background_image);

        Session::flash('success_message', 'Great! Site Setting has been saved successfully!');
        return redirect()->back();
    }

    public function message()
    {
        return view('admin.general_settings.message');
    }

    public function update_message(Request $request)
    {
        $this->validate($request, [
            'message_heading_one' => 'required|string',
            'message_heading_two' => 'required|string',
            'message_heading_three' => 'required|string',
            'message_btn_txt' => 'required|string',
            'message_background_image' => 'required|string|max:191',
            'message_background_image1' => 'required|string|max:191',
            'message_background_image2' => 'required|string|max:191',
        ]);
        update_static_option('message_heading_one', $request->message_heading_one);
        update_static_option('message_heading_two', $request->message_heading_two);
        update_static_option('message_heading_three', $request->message_heading_three);
        update_static_option('message_btn_txt', $request->message_btn_txt);
        update_static_option('message_background_image', $request->message_background_image);
        update_static_option('message_background_image1', $request->message_background_image1);
        update_static_option('message_background_image2', $request->message_background_image2);

        Session::flash('success_message', 'Great! Site Setting has been saved successfully!');
        return redirect()->back();
    }

    public function service()
    {
        return view('admin.general_settings.service');
    }

    public function update_service(Request $request)
    {
        $this->validate($request, [
            'service_heading_one' => 'required|string',
            'service_background_image' => 'required|string|max:191',
        ]);
        update_static_option('service_heading_one', $request->service_heading_one);
        update_static_option('service_background_image', $request->service_background_image);

        Session::flash('success_message', 'Great! Site Setting has been saved successfully!');
        return redirect()->back();
    }

    public function footer()
    {
        return view('admin.general_settings.footer');
    }

    public function update_footer(Request $request)
    {
        $this->validate($request, [
            'footer_heading_one' => 'required|string',
            'footer_background_image' => 'required|string|max:191',
            'footer_btn_txt' => 'required|string',
            'footer_btn_url' => 'required|string',
            'footer_ofc_location' => 'required|string',
            'footer_ofc_email' => 'required|string',
            'footer_ofc_email_url' => 'required|string',
            'footer_ofc_phone' => 'required|string',
            'footer_ofc_phone_url' => 'required|string',
            'footer_nav_heading' => 'required|string',
            'footer_nav_heading1' => 'required|string',
            'footer_nav_heading_url1' => 'required|string',
            'footer_nav_heading2' => 'required|string',
            'footer_nav_heading_url2' => 'required|string',
            'footer_nav_heading3' => 'required|string',
            'footer_nav_heading_url3' => 'required|string',
            'footer_nav_heading4' => 'required|string',
            'footer_nav_heading_url4' => 'required|string',
            'footer_nav_heading5' => 'required|string',
            'footer_nav_heading_url5' => 'required|string',
        ]);
        update_static_option('footer_heading_one', $request->footer_heading_one);
        update_static_option('footer_background_image', $request->footer_background_image);
        update_static_option('footer_btn_txt', $request->footer_btn_txt);
        update_static_option('footer_btn_url', $request->footer_btn_url);
        update_static_option('footer_ofc_location', $request->footer_ofc_location);
        update_static_option('footer_ofc_phone', $request->footer_ofc_phone);
        update_static_option('footer_ofc_phone_url', $request->footer_ofc_phone_url);
        update_static_option('footer_ofc_email', $request->footer_ofc_email);
        update_static_option('footer_ofc_email_url', $request->footer_ofc_email_url);
        update_static_option('footer_nav_heading', $request->footer_nav_heading);
        update_static_option('footer_nav_heading1', $request->footer_nav_heading1);
        update_static_option('footer_nav_heading_url1', $request->footer_nav_heading_url1);
        update_static_option('footer_nav_heading2', $request->footer_nav_heading2);
        update_static_option('footer_nav_heading_url2', $request->footer_nav_heading_url2);
        update_static_option('footer_nav_heading3', $request->footer_nav_heading3);
        update_static_option('footer_nav_heading_url3', $request->footer_nav_heading_url3);
        update_static_option('footer_nav_heading4', $request->footer_nav_heading4);
        update_static_option('footer_nav_heading_url4', $request->footer_nav_heading_url4);
        update_static_option('footer_nav_heading5', $request->footer_nav_heading5);
        update_static_option('footer_nav_heading_url5', $request->footer_nav_heading_url5);

        Session::flash('success_message', 'Great! Site Setting has been saved successfully!');
        return redirect()->back();
    }
}

