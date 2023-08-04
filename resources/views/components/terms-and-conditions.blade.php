<section class="h-screen grid place-items-center p-4">

    <div class= " bg-white w-full h-full max-w-3xl min-h-max mx-auto p-4 rounded-lg overflow-auto">
        <h1 class="text-2xl font-bold text-gray-900">
            Terms and Conditions
        </h1>
    <div class="mt-4 bg-gray-100 p-4 rounded-lg overflow-auto">

        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi tempore sint assumenda magni autem distinctio! Odit vitae repellat tempora temporibus, dicta deleniti, voluptatum cupiditate at consequuntur vero facilis, blanditiis quas?
            Ipsa at illum molestias ducimus! Iste quod voluptatum animi, deserunt adipisci aut sint, tempora molestias praesentium culpa ipsum vel ex pariatur doloremque dolor quae mollitia dolorum in rem? Iste, omnis?
            Eum debitis praesentium, quidem commodi ad consequuntur veniam recusandae qui, impedit fuga vitae asperiores odio? Iure eum aperiam nihil illo cum iusto, ea delectus. Officiis, excepturi. Fuga velit sunt repellendus.
            Beatae harum veritatis et ipsum temporibus quod vero explicabo enim, ipsa iste est eum facilis rerum quas distinctio suscipit dicta, quo quibusdam culpa tempore libero deleniti aliquam. Ducimus, impedit cupiditate.
            Dolorem veniam cupiditate officia eveniet quia. Numquam laboriosam pariatur earum praesentium quos, ad autem aperiam dignissimos itaque! Magnam sit qui itaque, voluptatibus quos impedit. Optio commodi consequatur nihil praesentium facilis?
            Quas soluta omnis, nulla laborum tempore ullam voluptate commodi natus temporibus modi. Cumque, ipsam accusamus totam officiis dolor minima alias? Odio, similique voluptatem accusantium praesentium laborum voluptatibus cumque molestias consequatur.
            Voluptatum impedit distinctio quo amet, repellendus numquam fuga et obcaecati? Iste deserunt sunt earum quas unde nihil, ex obcaecati itaque exercitationem non incidunt nisi temporibus sint nobis, expedita fuga eum.
            Temporibus consequatur eaque delectus deserunt non assumenda? Non soluta repudiandae consequuntur est perspiciatis pariatur fugit vero ratione, incidunt animi eos, nihil voluptas, dicta a natus. Voluptates facilis odio a dignissimos.
            Mollitia deserunt qui unde ducimus. Illum maiores perspiciatis exercitationem ea tempore eius explicabo at, odit iusto velit modi eos nesciunt fugiat quae commodi, neque cupiditate ipsum! Corporis esse delectus id.
            Facere, non. Voluptatem autem dignissimos nesciunt qui consequatur. Asperiores sit vitae eaque, repellendus debitis incidunt magnam itaque, reprehenderit cumque voluptatibus expedita, voluptatem quas repellat enim impedit repudiandae maxime laudantium rerum.
            A unde ut sunt laborum adipisci amet ducimus fugit impedit possimus. Possimus inventore quae sunt officia quisquam similique vel fugiat? Harum reiciendis ipsa eligendi iusto suscipit fugiat veniam repudiandae quam.
            Nam quis omnis expedita nesciunt aliquid velit id tempore facere pariatur, officia eaque et, repellendus labore odio quaerat tenetur cupiditate libero. Sint quas sequi, soluta enim iusto aperiam mollitia adipisci!
            Aspernatur, perferendis. Unde, magni sunt laboriosam eaque debitis cum rem dolores laudantium. Adipisci reprehenderit rerum aspernatur sequi iure, ducimus hic numquam voluptatem, deleniti vitae consectetur? Dolor rem nesciunt eaque pariatur.
            Distinctio possimus dignissimos accusamus sequi dicta. Distinctio facere veritatis nulla, eligendi sint, tenetur, exercitationem totam asperiores minima enim sit dignissimos consectetur modi suscipit commodi quod? Sint obcaecati quibusdam nostrum adipisci!
            Consectetur maiores eos fugiat eius, explicabo dolore voluptatibus vitae sapiente ratione quaerat dicta delectus adipisci corporis aut voluptatum illo accusantium, mollitia ullam at cupiditate et nostrum aliquam! Reiciendis, recusandae? Dolores!
            Quae accusantium dignissimos error pariatur excepturi ut nobis omnis? Consectetur, veritatis? Eaque saepe illum reiciendis id, facilis optio consequatur dolorum ratione dignissimos, similique quidem maiores repellendus quod earum magnam voluptas.
            Sit ducimus iste saepe nam cum molestiae esse perspiciatis distinctio fuga? Magnam fuga nam reiciendis ad dolorem incidunt animi illum quia quibusdam quaerat. Maiores adipisci possimus quibusdam quos eius. Velit!
            A, quae? Natus facere ullam sint dolore ipsum placeat perferendis nesciunt, modi minima sunt veritatis est dolorum vitae! Temporibus voluptate est nihil deserunt nulla provident aliquam inventore aspernatur, minus quis.
            Quis non voluptatem reprehenderit minus odit dicta ducimus natus? Repellendus soluta eveniet ab dolores illum, amet animi consequatur quod repellat asperiores numquam earum, distinctio officiis explicabo dicta! Reprehenderit, illo consequuntur!
        </p>
    </div>

<div class=" flex flex-col md:flex-row items-center justify-between ">

    {{-- i agree chek box --}}
    <div class="mt-4 flex items-center">
        <input type="checkbox" name="terms" id="terms" class="mr-2 ">
        <label for="terms">I agree to the terms and conditions</label>
    </div>

    {{-- buttons --}}
    <form action="{{ route('terms-and-conditions.agree') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-4 flex items-center justify-end">
            <button type="submit"  disabled class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                Agree
            </button >
        </div>
    </form>
</div>

<script>
    const terms = document.getElementById('terms');
    const button = document.querySelector('button[type="submit"]');

    terms.addEventListener('change', function(e) {
        if (e.target.checked) {
            button.disabled = false;
        } else {
            button.disabled = true;
        }
    });
</script>





</div>
</section>
