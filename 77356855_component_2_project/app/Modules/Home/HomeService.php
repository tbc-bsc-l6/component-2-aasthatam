<?php
declare(strict_types=1);

namespace App\Modules\Home;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use App\Modules\Blogs\BlogsService;

class HomeService
{
    const PAGE_LENGTH = 10;

    public function __construct(
        public readonly BlogsService $service
    ){

    }
    public function home(Request $request) : array 
    {
        $totalCount = $this->service->getTotalCount();
        $page = $this->getPageNumber($request, $totalCount);
        // $blogs = $this->service->UIList($page, self::PAGE_LENGTH);

        return  [
            "title" => "Tasty Bites",
            "page_length" => self::PAGE_LENGTH,
            "total_blogs" => $totalCount,
            "page_number" => $page,
            "blogs" => $this->service->UIList($page, self::PAGE_LENGTH),
            // [
            //     [
            //         "url" => "/",
            //         "is_trending" => true,
            //         "author" => "Sophia Bennett",
            //         "author_image_url" => "https://plus.unsplash.com/premium_photo-1690395794791-e85944b25c0f?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cHJvZmlsZSUyMHBob3RvJTIwZmVtYWxlfGVufDB8fDB8fHww",
            //         "image_url_portait" => "https://www.wholesomeyum.com/wp-content/uploads/2022/12/wholesomeyum-Garlic-Butter-Chicken-1.jpg",
            //         "image_url_landscape" => "https://blackvelvetstyling.com/cdn/shop/articles/chicken_squash_chilli_soup_autumn_recipe_landscape_food_photography_backgrounds_backdrops.jpeg?v=1573124488",
            //         "title" => "Creamy Garlic Butter Chicken",
            //         "date" => "August 23, 2025",
            //         "description" => "This dish combines tender chicken breasts with a rich and creamy garlic butter sauce. Perfect for weeknight dinners or a special meal, it pairs beautifully with mashed potatoes, rice, or crusty bread.",
            //         "tags" => "tag1, tag2, tag3"
            //     ],
            //     [
            //         "url" => "/",
            //         "is_trending" => true,
            //         "author" => "James Alexander Carter",
            //         "author_image_url" => "https://plus.unsplash.com/premium_photo-1665461700564-78476e329876?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8Y2hlZiUyMHBob3RvJTIwcHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D",
            //         "image_url_portait" => "https://stefaniaskitchenette.com/wp-content/uploads/2024/07/Carbonara-5.webp",
            //         "image_url_landscape" => "https://blackvelvetstyling.com/cdn/shop/articles/chicken_squash_chilli_soup_autumn_recipe_landscape_food_photography_backgrounds_backdrops.jpeg?v=1573124488",
            //         "title" => "Spaghetti Carbonara",
            //         "date" => "August 23, 2025",
            //         "description" => "Spaghetti Carbonara is a classic Italian pasta dish made with simple ingredients like spaghetti, eggs, Parmesan cheese, pancetta (or bacon), and black pepper. It’s creamy, flavorful, and delicious, with the sauce created by the heat of the pasta mixing with the egg and cheese mixture—no cream needed! Perfect for a quick and comforting meal.",
            //         "tags" => "tag1, tag2, tag3"
            //     ],
            //     [
            //         "url" => "/",
            //         "is_trending" => true,
            //         "author" => "Isabella Rose Taylor",
            //         "author_image_url" => "https://plus.unsplash.com/premium_photo-1690397038570-7ec0cacb37f2?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fHByb2ZpbGUlMjBwaG90byUyMGZlbWFsZXxlbnwwfHwwfHx8MA%3D%3D",
            //         "image_url_portait" => "https://life-in-the-lofthouse.com/wp-content/uploads/2022/01/Easy-Molten-Chocolate-Lava-Cakes4.jpg",
            //         "image_url_landscape" => "https://blackvelvetstyling.com/cdn/shop/articles/chicken_squash_chilli_soup_autumn_recipe_landscape_food_photography_backgrounds_backdrops.jpeg?v=1573124488",
            //         "title" => "Chocolate Lava Cake",
            //         "date" => "August 23, 2025",
            //         "description" => "Chocolate Lava Cake is a decadent dessert featuring a rich, molten center of melted chocolate encased in a soft, cake-like exterior. When you cut into it, the warm, gooey chocolate lava flows out, making it a perfect treat for chocolate lovers. Often served with a scoop of ice cream or fresh berries, it's a luxurious and indulgent dessert.",
            //         "tags" => "tag1, tag2, tag3"
            //     ],
    
            // ],
            "trending" => $this->service->UIList(
                $page, 
                self::PAGE_LENGTH,
                ["is_trending" => 1]
            ),
            // [
            //     [
            //         "url" => "/",
            //         "is_trending" => true,
            //         "author" => "Sophia Bennett",
            //         "author_image_url" => "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGVyc29uJTIwcHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D",
            //         "image_url_portait" => "https://www.wholesomeyum.com/wp-content/uploads/2022/12/wholesomeyum-Garlic-Butter-Chicken-1.jpg",
            //         "image_url_landscape" => "https://blackvelvetstyling.com/cdn/shop/articles/chicken_squash_chilli_soup_autumn_recipe_landscape_food_photography_backgrounds_backdrops.jpeg?v=1573124488",
            //         "title" => "Creamy Garlic Butter Chicken",
            //         "date" => "August 23, 2025",
            //         "description" => "This dish combines tender chicken breasts with a rich and creamy garlic butter sauce. Perfect for weeknight dinners or a special meal, it pairs beautifully with mashed potatoes, rice, or crusty bread.",
            //         "tags" => "tag1, tag2, tag3"
            //     ],  
            //     [
            //         "url" => "/",
            //         "is_trending" => true,
            //         "author" => "Sophia Bennett",
            //         "author_image_url" => "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGVyc29uJTIwcHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D",
            //         "image_url_portait" => "https://www.wholesomeyum.com/wp-content/uploads/2022/12/wholesomeyum-Garlic-Butter-Chicken-1.jpg",
            //         "image_url_landscape" => "https://blackvelvetstyling.com/cdn/shop/articles/chicken_squash_chilli_soup_autumn_recipe_landscape_food_photography_backgrounds_backdrops.jpeg?v=1573124488",
            //         "title" => "Creamy Garlic Butter Chicken",
            //         "date" => "August 23, 2025",
            //         "description" => "This dish combines tender chicken breasts with a rich and creamy garlic butter sauce. Perfect for weeknight dinners or a special meal, it pairs beautifully with mashed potatoes, rice, or crusty bread.",
            //         "tags" => "tag1, tag2, tag3"
            //     ]
            // ],
            "recentlyWrite" => $this->service->UIListRecent(),
            // [
            //     [
            //         "url" => "/",
            //         "is_trending" => true,
            //         "author" => "Sophia Bennett",
            //         "author_image_url" => "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGVyc29uJTIwcHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D",
            //         "image_url_portait" => "https://www.wholesomeyum.com/wp-content/uploads/2022/12/wholesomeyum-Garlic-Butter-Chicken-1.jpg",
            //         "image_url_landscape" => "https://blackvelvetstyling.com/cdn/shop/articles/chicken_squash_chilli_soup_autumn_recipe_landscape_food_photography_backgrounds_backdrops.jpeg?v=1573124488",
            //         "title" => "Creamy Garlic Butter Chicken",
            //         "date" => "August 23, 2025",
            //         "description" => "This dish combines tender chicken breasts with a rich and creamy garlic butter sauce. Perfect for weeknight dinners or a special meal, it pairs beautifully with mashed potatoes, rice, or crusty bread.",
            //         "tags" => "tag1, tag2, tag3"
            //     ],
            //     [
            //         "url" => "/",
            //         "is_trending" => true,
            //         "author" => "Sophia Bennett",
            //         "author_image_url" => "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGVyc29uJTIwcHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D",
            //         "image_url_portait" => "https://www.wholesomeyum.com/wp-content/uploads/2022/12/wholesomeyum-Garlic-Butter-Chicken-1.jpg",
            //         "image_url_landscape" => "https://blackvelvetstyling.com/cdn/shop/articles/chicken_squash_chilli_soup_autumn_recipe_landscape_food_photography_backgrounds_backdrops.jpeg?v=1573124488",
            //         "title" => "Creamy Garlic Butter Chicken",
            //         "date" => "August 23, 2025",
            //         "description" => "This dish combines tender chicken breasts with a rich and creamy garlic butter sauce. Perfect for weeknight dinners or a special meal, it pairs beautifully with mashed potatoes, rice, or crusty bread.",
            //         "tags" => "tag1, tag2, tag3"
            //     ]
    
            // ],
            "tags" => [
                ["url" => "/", "name" => "Cooking"],
                ["url" => "/", "name" => "Recipe"],
                ["url" => "/", "name" => "Healthy Eating"],
                ["url" => "/", "name" => "Food Tips"]
            ]
        ];

    }
    private function getPageNumber(Request $request, int $totalCount): int
    {
        $maxNumberofPages = ceil($totalCount / self::PAGE_LENGTH);
        $page = $request->query("page", 1);
        try{
            $request->validate(
                ["page" => "numeric|min:1|max:$maxNumberofPages"],
                ["page" => $page]
            );

        }catch(ValidationException $error){
            Log::error($error->getMessage());
            abort(404);
        }
  
        return(int)$page;

    }
    
  
}

