<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use Illuminate\support\str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class CategoriesController extends Controller
{
    public function index(){
      //echo "aya ananaa";
    	$categories = Category::all();//بجيب كل الداتا وبحط بمتغير 
      //dd($categories );   
      return view('admin.categories.index', [
            'categories' => $categories,// هنا بمرر كل الداتا اللى جبتها بمتغير
           
        ]);
      }
      public function create(){
      	  return view('admin.categories.create', [
            'category' => new Category(),
            'parnets' => Category::all(['id', 'name']),
        ]);

      }
       public function store(Request $request){
       	//dd($request);
       	//$request->name;
        //$request->input('name');
        //$request->get('name');
        //$request->post('name');htmlمابيفهم غير ال  get post 
        //$request->query('name');

        //dd($request->except('_token', 'parent_id'));

        $validator = Validator::make($request->all(), [
          'name' => 'required|string|max:255|min:3|unique:categories,name',
          'parent_id' => 'nullable|int|exists:categories,id',
      ]);

    
      $validator->validate();//بتعمل فحص لكل الداتا

        $category = new Category();
        $category->name = $request->post('name');
        $category->slug = Str::slug($request->post('name'));
        $category->parent_id = $request->post('parent_id');

        $category->save();

        // /admin/categories
        return redirect('/admin/categories')->with('success', 'Category created!');
            //->route('admin.categories.index')
            //->with('success', 'Category created!');*/// هنا بخزن كل الداتا في منطقة وحدة اسمها سكسز عشان اضل اقرا من نفس المكان
      	

      }

    public function edit($id)
    {
        // SELECT * FROM categories WHERE id = $idبجيب كل الداتا 
        $category = Category::find($id);
       if ($category == null) {
            abort(404);
        }
        $parnets = Category::where('id', '<>', $id)->get();// فقط بدي الداتا بناء على الاي دي اللى بعتو 

        return view('admin.categories.edit', [
            'category' => $category,
            'parnets' => $parnets,
        ]);
    }



    public function update(Request $request, $id)
    {


      $unique = new Unique('categories', 'name');//من جدول ال كاتيجرويز  بدي اعمل الاسم بحيث يكون يونيك
      $unique->ignore($id);//بناء عالاي دي هدا اللى بدي استثنيه
      $request->validate([
        'name' => [
            'required',
            'string',
            'max:255',
            'min:3',
            //'unique:categories,name,' . $id,// تلاث طرق لاني اقدر اعمل اي حقل بحيث يكون يونيك
            //Rule::unique('categories', 'name')->ignore($id),باستثناء الاي دي هدا
            $unique,
            function($attribute, $value, $fail) {//custom validation rule 
                if ($value == 'aya') {
                    $fail('This word is not allowed!');
                }
            }
        ],
        'parent_id' => 'nullable|int|exists:categories,id',
    ], 
    //في حال بدي اكتب مسج بايدي انا ما يكون ديفولت
    /*[
        'required' => 'هذا الحقل مطلوب',
        'min' => 'قيمة الحقل صغيرة أكثر من اللازم',
    ]*/
  );

         $category = Category::findOrFail($id);
// نفس الميثود اللى في الedit
//بحيث تفحص لو مش موجود يقلي بيج نت فاوند
        $category->name = $request->post('name');
        $category->slug = Str::slug($request->post('name'));
        $category->parent_id = $request->post('parent_id');
       //dd($category);
        $category->save();
         return redirect('/admin/categories')->with('success', 'Category updated');
    }
     public function destroy($id)
    {
        // 2 sentences هنا نفذ بأكتر من جملة
        //$category = Category::findOrFail($id);
        //$category->delete();

        // Method 2
        //Category::where('id', '=', $id)->delete();

        // Method 3 نفذها بجملة وحدة
        Category::destroy($id);
         return redirect('/admin/categories')->with('success', 'Category deleted');
        

        // return redirect()
        //     ->route('admin.categories.index')
        //     ->with('success', 'Category deleted!');
    }


}