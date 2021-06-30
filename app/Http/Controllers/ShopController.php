<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Lead;
use App\State;

class ShopController extends MyController
{
    public function drinkingWater()
    {
        if (!Session::has('addresses'))
            Session::put('addresses', []);

        $addresses = Session::get('addresses');
        $states = State::all();

        // fetch required products from DB
        $Products = Product::whereIn('key', array('ultimate-system', 'rv-system', 'traveling-kit', 'faucet', 'shower-filter'))->orderBy('id', 'asc')->get();

        $traveling_kit = $Products->firstWhere('key', 'traveling-kit');
        $shower_filter = $Products->firstWhere('key', 'shower-filter');
        $faucet = $Products->firstWhere('key', 'faucet');

        // main products
        $products = $Products->whereIn('key', ['ultimate-system', 'rv-system']);

        // add faucet price to every machine's price
        foreach ($products as $product)
            $product->price += $faucet->price;

        return view('shop.drinking_water', compact('products', 'traveling_kit', 'shower_filter', 'addresses', 'states'));
    }

    // $hashids is an array containing user_id, admin_id and a random integer which we'll discard (mqsgtv)
    public function adminControl($hashids)
    {
        $Hashids = new Hashids(config('springaqua.hashdis_salt'));
//        echo $Hashids->encode(3, 10, rand(10,99));exit;
        $ids = $Hashids->decode($hashids);
        if (count($ids) === 3) {
            [$user_id, $admin_id, $ignoreMe] = $Hashids->decode($hashids);
            $Lead = Lead::find($user_id);

            if ($Lead) {
                Session::put('admin_id', $admin_id);
                return redirect(url('u=' . $Lead->uid . '/shop/drinking-water'));
            }
        } else
            abort(404);
    }

    /* for later use
public function index($uid)
{
    $products = [
        (object)[
            'name' => 'Drinking Water',
            'slug' => '/' . $uid . '/shop/drinking-water',
            'image' => '/images/products/premium.png'
        ],
        (object)[
            'name' => 'Shower Filter',
            'slug' => '/' . $uid . '/shop/shower-filter',
            'image' => '/images/products/shower-filter.png'
        ]
    ];
    return view('shop.index', ['products' => $products]);
}
*/

}
