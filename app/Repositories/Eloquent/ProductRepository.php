<?php
namespace App\Repositories\Eloquent;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Comment;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return Product::class;
    }

    public function getStatisticProduct(){
        $products = $this->model->all();
        return $products;
    }

    public function getProduct()
    {
        $product = $this->model->orderby('id', 'desc')->paginate(config('constraint.app.paginate'));
        return $product;
    }

    public function getProductProminent()
    {
        $prominent = $this->model->where('featured', 'Prominent')->orderby('id', 'desc')->get()->take(4);
        return $prominent;
    }

    public function getProductNotProminent()
    {
        $notprominent = $this->model->where('featured', 'Not Prominent')->orderby('id', 'desc')->get()->take(8);
        return $notprominent;
    }

    public function findCommentProduct($id)
    {
        try {
        $comment = Comment::where('com_product',$id)->get();
        return $comment;
        } catch (Exception $exception) {

            return back()->withErrors( __('message.findid'));
        }
    }

    public function AVGCommentProduct($id)
    {
        try {
        $comment = Comment::where('com_product',$id)->avg('com_rating');
        return $comment;
        } catch (Exception $exception) {

            return back()->withErrors( __('message.findid'));
        }
    }

    public function createProduct(array $data)
    {
        $result = false;
        try {
        if ($data['product_img']) {
            $file = $data['product_img'];
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move('image', $fileName);
        }
        $product = $this->model->create([
            'product_name' => $data['product_name'],
            'product_name_slug' => Str::slug($data['product_name']),
            'product_img' => $fileName,
            'description' => $data['description'],
            'price' => $data['price'],
            'condition' => $data['condition'],
            'warranty' => $data['warranty'],
            'accessories' => $data['accessories'],
            'promotion' => $data['promotion'],
            'status' => $data['status'],
            'featured' => $data['featured'],
            'classify' => $data['classify'],
            'categories_id' => $data['categories_id'],
        ]);
        $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function findProduct($id)
    {
        try {
        $product = Product::find($id);
        return $product;
        } catch (Exception $exception) {

            return back()->withErrors( __('message.findid'));
        }
    }

    public function updateProduct($id, array $data)
    {
        $result = false;
        try {
        if (!isset($data['product_img'])) {
            $product = $this->model->find($id);
            $data['product_img'] = '';
            $fileName = $product->product_img;
        }
        if ($data['product_img']) {
            $file = $data['product_img'];
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $file->move('image', $fileName);
        }
        $product = $this->model->find($id);
        $product->product_name = $data['product_name'];
        $product->product_name_slug = Str::slug($data['product_name']);
        $product->product_img = $fileName;
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->condition = $data['condition'];
        $product->warranty = $data['warranty'];
        $product->featured = $data['featured'];
        $product->accessories = $data['accessories'];
        $product->promotion = $data['promotion'];
        $product->status = $data['status'];
        $product->classify = $data['classify'];
        $product->categories_id = $data['categories_id'];
        $product->save();
        $result = true;
        } catch (Exception $exception) {

            return $result;
        }

        return $result;
    }

    public function product_detail($id)
    {
        try {
        $result = $this->model->find($id);
        return $result;
        } catch (Exception $exception) {

            return back()->withErrors( __('message.edit'));
        }
    }

    public function deleteProduct($id)
    {
        $data = null;
        $result = $this->model->find($id);
        if ($result) {
            $data = $result->delete();

            return $data;
        }

        return $data;
    }
}
