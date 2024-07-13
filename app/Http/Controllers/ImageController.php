<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
   
    public function index()
    {
        //
        return view('admin.images.index');
    }

    public function editLogo()
    {
        $logo = Image::where('group', 1)->first();
        return view('admin.images.logo.edit', compact('logo'));
    }
    public function updateLogo(Request $request)
    {
        $logo = Image::find($request->hidden_id);
        if ($request->image_link_check != $logo->image_link) {
            $validator = $request->validate([

                'image_link' => 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168',
            ]);
            if (!$validator) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        $imageSaveLocation = public_path('img/logo');
        if ($request->image_link_check != $logo->image_link) {
            $logoImg = $request->file('image_link');
            $logoName = time() . '_' . $logoImg->getClientOriginalName();
            $logoImg->move($imageSaveLocation, $logoName);
            $logo->image_link = $logoName;
        } else {
            $logo->image_link = $request->image_link_check;
        }
        $logo->save();
        return redirect()->route('admin.images.logo.edit')->with('success', 'Cập nhật Logo thành công');
    }
    public function editLongBanners()
    {
        $longBanners = Image::where('group', 3)->get();
        return view('admin.images.long-banners.edit', compact('longBanners'));
    }
    public function updateLongBanners(Request $request)
    {
        
        $longBanner1 = Image::where('id', 5)->first();
        $longBanner2 = Image::where('id', 6)->first();
        $longBanner3 = Image::where('id', 7)->first();
        $longBanner4 = Image::where('id', 8)->first();

        
        if ($request->image_link_check_banner1 != $longBanner1->image_link) {
            $validator = $request->validate([

                'image_link_banner1' => 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168',
            ]);
            if (!$validator) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        if ($request->image_link_check_banner2 != $longBanner2->image_link) {
            $validator = $request->validate([

                'image_link_banner2' => 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168',
            ]);
            if (!$validator) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        if ($request->image_link_check_banner3 != $longBanner3->image_link) {
            $validator = $request->validate([

                'image_link_banner3' => 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168',
            ]);
            if (!$validator) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        if ($request->image_link_check_banner4 != $longBanner4->image_link) {
            $validator = $request->validate([

                'image_link_banner4' => 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168',
            ]);
            if (!$validator) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
       
        $imageSaveLocation = public_path('img/long-banner');

        //Long banner 1
        if ($request->image_link_check_banner1 != $longBanner1->image_link) {
            $longBanner1Img = $request->file('image_link_banner1');
            $longBanner1Name = time() . '_' . $longBanner1Img->getClientOriginalName();
            $longBanner1Img->move($imageSaveLocation, $longBanner1Name);
            $longBanner1->image_link = $longBanner1Name;
        } else {
            $longBanner1->image_link = $request->image_link_check_banner1;
        }
        $longBanner1->save();
        //Long banner 2
        if ($request->image_link_check_banner2 != $longBanner2->image_link) {
            $longBanner2Img = $request->file('image_link_banner2');
            $longBanner2Name = time() . '_' . $longBanner2Img->getClientOriginalName();
            $longBanner2Img->move($imageSaveLocation, $longBanner2Name);
            $longBanner2->image_link = $longBanner2Name;
        } else {
            $longBanner2->image_link = $request->image_link_check_banner2;
        }
        $longBanner2->save();

        //Long banner 3
        if ($request->image_link_check_banner3 != $longBanner3->image_link) {
            $longBanner3Img = $request->file('image_link_banner3');
            $longBanner3Name = time() . '_' . $longBanner3Img->getClientOriginalName();
            $longBanner3Img->move($imageSaveLocation, $longBanner3Name);
            $longBanner3->image_link = $longBanner3Name;
        } else {
            $longBanner3->image_link = $request->image_link_check_banner3;
        }
        $longBanner3->save();
        //Long banner 4
        
        if ($request->image_link_check_banner4 != $longBanner4->image_link) {
            $longBanner4Img = $request->file('image_link_banner4');
            $longBanner4Name = time() . '_' . $longBanner4Img->getClientOriginalName();
            $longBanner4Img->move($imageSaveLocation, $longBanner4Name);
            $longBanner4->image_link = $longBanner4Name;
        } else {
            $longBanner4->image_link = $request->image_link_check_banner4;
        }
        $longBanner4->save();

        return redirect()->route('admin.images.long-banners.edit')->with('success', 'Cập nhật Long Banners thành công');
    }
    public function editSliderBanners()
    {
        $sliders = Image::where('group', 2)->get();
        return view('admin.images.slider-banners.edit', compact('sliders'));
  
    }
    public function updateSliderBanners(Request $request){
        $slider1 = Image::where('id', 2)->first();
        $slider2 = Image::where('id', 3)->first();
        $slider3 = Image::where('id', 4)->first();

       
        if ($request->image_link_check_banner1 != $slider1->image_link) {
            $validator = $request->validate([

                'image_link_banner1' => 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168',
            ]);
            if (!$validator) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        if ($request->image_link_check_banner2 != $slider2->image_link) {
            $validator = $request->validate([

                'image_link_banner2' => 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168',
            ]);
            if (!$validator) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
        if ($request->image_link_check_banner3 != $slider3->image_link) {
            $validator = $request->validate([

                'image_link_banner3' => 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168',
            ]);
            if (!$validator) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

       
        
        $imageSaveLocation = public_path('img/slider-banner');

        //Slider 1
        if ($request->image_link_check_banner1 != $slider1->image_link) {
            $sliderBanner1Img = $request->file('image_link_banner1');
            $sliderBanner1Name = time() . '_' . $sliderBanner1Img->getClientOriginalName();
            $sliderBanner1Img->move($imageSaveLocation, $sliderBanner1Name);
            $slider1->image_link = $sliderBanner1Name;
        } else {
            $slider1->image_link = $request->image_link_check_banner1;
        }
        $slider1->save();
        //Slider 2
        if ($request->image_link_check_banner2 != $slider2->image_link) {
            $sliderBanner2Img = $request->file('image_link_banner2');
            $sliderBanner2Name = time() . '_' . $sliderBanner2Img->getClientOriginalName();
            $sliderBanner2Img->move($imageSaveLocation, $sliderBanner2Name);
            $slider2->image_link = $sliderBanner2Name;
        } else {
            $slider2->image_link = $request->image_link_check_banner2;
        }
        $slider2->save();

        //Long banner 3
        if ($request->image_link_check_banner3 != $slider3->image_link) {
            $sliderBanner3Img = $request->file('image_link_banner3');
            $sliderBanner3Name = time() . '_' . $sliderBanner3Img->getClientOriginalName();
            $sliderBanner3Img->move($imageSaveLocation, $sliderBanner3Name);
            $slider3->image_link = $sliderBanner3Name;
        } else {
            $slider3->image_link = $request->image_link_check_banner3;
        }
        $slider3->save();
        return redirect()->route('admin.images.slider-banners.edit')->with('success', 'Cập nhật Sliders thành công');
   
    }
   
}
