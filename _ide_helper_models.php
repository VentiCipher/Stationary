<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App {
    /**
     * App\Cart
     *
     * @property int $id
     * @property int $users_id
     * @property int $products_id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property-read \App\User $users
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereProductsId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Cart whereUsersId($value)
     */
    class Cart extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\Categories
     *
     * @property int $id
     * @property string $name
     * @property string $createby
     * @property string $description
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Categories whereCreateby($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Categories whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Categories whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Categories whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Categories whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Categories whereUpdatedAt($value)
     */
    class Categories extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\Image
     *
     * @property int $id
     * @property string $name
     * @property string $product_id
     * @property string $category_id
     * @property string $path
     * @property string $createby
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property-read \App\Product $products
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCreateby($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Image wherePath($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereProductId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Image whereUpdatedAt($value)
     */
    class Image extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\Product
     *
     * @property int $id
     * @property string $name
     * @property int $in_stock
     * @property int $category_id
     * @property string $description
     * @property float $price
     * @property float|null $price_promo
     * @property string|null $color
     * @property string $createby
     * @property string|null $promotion_id
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Categories[] $categories
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Image[] $images
     * @property-read \App\User $users
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCategoryId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereColor($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreateby($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereInStock($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePricePromo($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePromotionId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
     */
    class Product extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\User
     *
     * @property int $id
     * @property string $name
     * @property string $surname
     * @property string|null $address
     * @property string|null $phonenumber
     * @property string $gender
     * @property int $age
     * @property string $email
     * @property string $birthdate
     * @property string|null $paymentcard
     * @property string $roles
     * @property string $password
     * @property string|null $profilepic
     * @property int $dealer_approve
     * @property string|null $remember_token
     * @property \Carbon\Carbon|null $created_at
     * @property \Carbon\Carbon|null $updated_at
     * @property-read \App\Cart $carts
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
     * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAddress($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAge($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBirthdate($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDealerApprove($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGender($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePaymentcard($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhonenumber($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereProfilepic($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoles($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSurname($value)
     * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
     */
    class User extends \Eloquent
    {
    }
}

namespace App {
    /**
     * App\Wishlist
     *
     * @property-read \App\User $users
     */
    class Wishlist extends \Eloquent
    {
    }
}

