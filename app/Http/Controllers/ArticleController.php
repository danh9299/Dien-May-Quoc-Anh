<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listAllArticles(){
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('main.articles.list-all-articles', ['articles' => $articles]);
    }
    
  /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        
        return view('main.articles.show', compact('article'));
    }


    public function index()
    {
        //
        $articles =  Article::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.articles.index', ['articles' => $articles]);
    }
    public function search(Request $request){
        $searchText = $request->input('search');
        $keywords = explode(' ', $searchText);
        $articles = Article::query();
        // Combine conditions for all keywords
        $articles->where(function ($query) use ($keywords) {
            foreach ($keywords as $keyword) {
                $keywordWithoutSpace = str_replace(' ', '', $keyword);
                $query->where(function ($subQuery) use ($keywordWithoutSpace) {
                    $subQuery->whereRaw("REPLACE(name, ' ', '') LIKE ?", ['%' . $keywordWithoutSpace . '%']);
                });
            }
        });
        $articles = $articles->orderBy('updated_at', 'desc')->paginate(10)->appends(['search' => $searchText]);
     
return view('admin.articles.index', ['articles' => $articles]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.articles.create');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'name' => 'required',
            'image_link' => 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168',
        ]);

        if (!$validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $article = new Article;
        $article->name = $request->name;
        if (is_null($request->content)) {
            $article->content = "<p>Nội dung đang được cập nhật</p>";
        } else {
            $article->content = $request->content;
        }
        if (is_null($request->meta_description)) {
            $article->meta_description = "Nội dung đang được cập nhật";
        } else {
            $article->meta_description = $request->meta_description;
        }
        
        $imageSaveLocation = public_path('img/article_images');
        $imageUrlSave = 'img/article_images';
        $mainImage = $request->file('image_link');
        $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
        $mainImage->move($imageSaveLocation, $mainImageName);
        $article->image_link = $imageUrlSave.'/'.$mainImageName;
        $article->author_id = $request->author_id;
        $article->save();
        return redirect()->route('admin.articles.index')->with('success', 'Thêm mới Tin tức thành công');
    }

  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
        $rules = [
            'name' => 'required',
        ];

        // Conditionally add 'image_link' rule
        $article = Article::find($request->hidden_id);
        if ($request->image_link_check != $article->image_link) {
            $rules['image_link'] = 'required|file|mimes:jpeg,png,webp,jpg,svg|max:7168';
        }
      

        $validator = $request->validate($rules);


        if (!$validator) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $article->name = $request->name;
        if (is_null($request->content)) {
            $article->content = "<p>Nội dung đang được cập nhật</p>";
        } else {
            $article->content = $request->content;
        }
        if (is_null($request->meta_description)) {
            $article->meta_description = "Nội dung đang được cập nhật";
        } else {
            $article->meta_description = $request->meta_description;
        }
        $article->author_id = $request->author_id;
        $imageSaveLocation = public_path('img/article_images');
        $imageUrlSave = 'img/article_images';
        if ($request->image_link_check != $article->image_link) {
            $mainImage = $request->file('image_link');
            $mainImageName = time() . '_' . $mainImage->getClientOriginalName();
            $mainImage->move($imageSaveLocation, $mainImageName);
            $article->image_link = $imageUrlSave.'/'.$mainImageName;
        } else {
            $article->image_link = $request->image_link_check;
        }
        $article->save();
        return redirect()->route('admin.articles.index')->with('success', 'Cập nhật Tin tức thành công');
    }
    public function delete(Article $article){
        return view('admin.articles.delete', compact('article'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Xóa tin tức thành công!');
        //
    }
}