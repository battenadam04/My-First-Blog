<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use Mail;
use Session;

class PagesController extends Controller {

	public function getIndex() {
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = Category::all();
        $tags = Tag::all();

		return view('pages.welcome')->withPosts($posts)->withCategories($categories)->withTags($tags);
	}

	public function getAbout() {
		$first = 'Alex';
		$last = 'Curtis';

		$fullname = $first . " " . $last;
		$email = 'alex@jacurtis.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}


    public function getPortfolio() {
        return view('pages.portfolio');
    }

    public function getService() {
        return view('pages.service');
    }


    public function getContact() {


        return view('pages.contact');
    }

	public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('adambatten@live.co.uk');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your Email was Sent!');

		return redirect('/');
	}


}