use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function usersayfasigoster()
    {
        return view("usersedit", [
            'user' => auth()->user() // ✅ blade'e kullanıcı gönderiyoruz
        ]);
    }

    public function sil()
    {
        $user = Auth::user();
        $user->delete();
        return redirect("/index")->with("basari", "Başarılı bir şekilde silindi");
    }

    public function guncelle(Request $request)
    {
        $user = Auth::user(); // ✔️ şu anki kullanıcıyı al

        $validate = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email,".$user->id,
            "password" => "nullable|min:6"
        ]);

        $user->name = $validate["name"];
        $user->email = $validate["email"];

        if (!empty($validate["password"])) {
            $user->password = Hash::make($validate["password"]);
        }

        $user->save();

        return redirect()->back()->with("basari", "Profil başarıyla güncellendi");
    }
}
