<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PageKadet2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            [
                'page_type' => '8',
                'title' => 'Южный военный округ',
                'text' => '.',
                'image' => '/kadet/b1/0001.jpg',
                'gallery' => '["\/kadet\/4d858cb48bc152151a4a0a37451c4911.jpg","\/kadet\/f7c86945e6ff49676ad3285135a0e2fb.jpg","\/kadet\/af5bcab05643a7465e6b894195ae3f3a.jpg","\/kadet\/2eaf1376acf633e119f5246341345a3e.jpg","\/kadet\/1ddcc9a0b2fea01163fb1e82e95ff937.jpg","\/kadet\/2403c352bf71dc17c52080c8333e9304.jpg","\/kadet\/cfcb445b5fc95bc9d30fd6ec958afa88.jpg","\/kadet\/0b82484e8734a3e65aac860e8dc4b2ea.jpg","\/kadet\/a621905b771b4c4bf422394d852ecbf5.jpg","\/kadet\/d85dd2ac4515ebc8b1e7192efc677075.jpg","\/kadet\/a92b2358185ceae687e0ed45ca6fcf7c.jpg","\/kadet\/7fd5afcd53e84121350d3b5f7623de6d.jpg","\/kadet\/ca2f1cfa8e3d6e4380807771ca812116.jpg","\/kadet\/5ae19b735228c827ce01ee81cbc4cd72.jpg","\/kadet\/db32aa331e0529489c5e7afb09ef41a3.jpg","\/kadet\/446c2450e36da70ea7f165c653f2a164.jpg","\/kadet\/11426f0cdc2afe7df658b6ad52ad0d24.jpg","\/kadet\/27ca9e6938c69824fa34ad481e60b346.jpg","\/kadet\/86356a8ae9815f242d725059f8c1a684.jpg","\/kadet\/41e88789098747dff9db2a585da9b33a.jpg","\/kadet\/b2679a787ec1eeca5c03ce5a40b82176.jpg","\/kadet\/136d958dd0d75872b93d93c84f304e92.jpg","\/kadet\/67ab4d9973dcc946dc0ab62b755166ab.jpg","\/kadet\/c935dc49a67ebb0721e0f651433d07f6.jpg","\/kadet\/42a0899f44853b95d369e93a80f6d91f.jpg","\/kadet\/e6a8ac7090637c526e3db7acd97e0e19.jpg","\/kadet\/37aa33f3275941762c4df7b7594cfb16.jpg","\/kadet\/6fabe4aba6a1088f6606a23ae4e820cf.jpg","\/kadet\/24d8ef274284677e0f1f2c33904c8086.jpg","\/kadet\/deeceea36c3255459844f2c02e7dac10.jpg","\/kadet\/d8dffb32acbce500d9b9ab01d270d904.jpg","\/kadet\/eaa4d78cf0677bd1314c1fb318cf5618.jpg","\/kadet\/82deaf8f5b83c4378dc641bf5296e031.jpg","\/kadet\/f85bd90eec64c79517f8f349d071aa8c.jpg"]',
                'parent_id' => NULL,
                'created_at' => '2020-11-03 00:00:00'
            ],
            [
                'page_type' => '8',
                'title' => 'Фотоальбом 2019',
                'text' => '.',
                'image' => '/kadet/b2/0001.jpg',
                'gallery' => '["\/kadet\/b280a2df7fd094ac3dec87667a829046.jpg","\/kadet\/e24c0e3a3833f5474a7ab78bcacd85cb.jpg","\/kadet\/98b494f0f5098bc0c4d9ce0bf4d614e1.jpg","\/kadet\/cd6fb495bdc330cd5cca94328bf8513b.jpg","\/kadet\/71cf5d62f00afa79c633edfbcfe97cde.jpg","\/kadet\/3073d38db21912f1d5c419352ea688c8.jpg","\/kadet\/238622dc57172de5bdc316415d030e3e.jpg","\/kadet\/e459ff379002e4c3b9baccfd9846e8b1.jpg","\/kadet\/7a79a4e75a821ffe995135192786963c.jpg","\/kadet\/21a8a7a6db729414f17a6bdfb24c6714.jpg","\/kadet\/64b021bba88b89938cf9e4ca3824e4b8.jpg","\/kadet\/e3a7f1e0bd8718591f2589ea9902721c.jpg","\/kadet\/703364e34534512f2ed3549de2f41a1e.jpg","\/kadet\/85e379f296c7ce04604f44884ee27ceb.jpg","\/kadet\/1a5b316f755936c515618cba02f31ebb.jpg","\/kadet\/e00e614ba783727697c7966918e08456.jpg","\/kadet\/f3f8cd6005ae50e10058abba357bbb7f.jpg","\/kadet\/8d015c01108ecc17f227fef094d7a95c.jpg","\/kadet\/22f44b90376cd09658a490c2508d4b95.jpg","\/kadet\/8d8e171d1464d981a5a45db4a7f09722.jpg","\/kadet\/2834016701a3d78d4bbd2eb55fa5667e.jpg","\/kadet\/d30eb63c50e548ad425f3de5634f4d4a.jpg","\/kadet\/30aaba0a686231d7a4bdde8661bdf33c.jpg","\/kadet\/87acc1564b3274b0194d774f67940875.jpg","\/kadet\/d7c814438283d1d627d72e5d813df076.jpg","\/kadet\/cd7b1b2a666556ec7649f4439d0b10ed.jpg","\/kadet\/57b3a19a58105393717c6e7d90eec8e4.jpg","\/kadet\/9ac353900fd33c9c7b3729a123e3fd55.jpg","\/kadet\/78a8589d1e9ff87129b6272ff2859826.jpg","\/kadet\/301040b6ae60311a858dea11b6c6789f.jpg","\/kadet\/86b7afb76a58b4d72bdfb7de056f8ae7.jpg","\/kadet\/c8a607b80f4e898c6dcc9dd85310f6c6.jpg","\/kadet\/648c6ca9af51a253a94c0f32c7c9df55.jpg","\/kadet\/f7eda09b3ce1d94d5df522cf80b4ebd9.jpg","\/kadet\/7db989413db992574cf6da22773c07cb.jpg","\/kadet\/cddbaf977c0a50f2ff372c52e0a82152.jpg","\/kadet\/b46aab56a7b0590083bf83f41391901e.jpg","\/kadet\/acad8fde15456b5417fe67cc44b4a9c8.jpg","\/kadet\/d084b208588e76efc0ba3c98343f0ff6.jpg","\/kadet\/cc92e573419a9167211d3c14c5a4ffd6.jpg","\/kadet\/041205c994fba3d3a9bc700374056dc0.jpg","\/kadet\/cb1dc620ac28bdfcc2f211f51ab6fd79.jpg","\/kadet\/445d2e2a0f9e95cfb4023349aa43e230.jpg","\/kadet\/3fcd95283d44f62f029a046f401a2068.jpg","\/kadet\/a144d72a038fed01b201bc3e71152e50.jpg","\/kadet\/8c56b1c47083038ab0894b5359bbf56f.jpg","\/kadet\/e41e951ceb8c9afa770bbcfaa26e3114.jpg","\/kadet\/f6cc106f614510a77ec00547e68c0324.jpg","\/kadet\/de125116f88e76ca61d973810aa6a4f7.jpg","\/kadet\/becaa69d67814a251e1a7b903839c39c.jpg","\/kadet\/28344147d7f6acbb34567857d26e89bf.jpg","\/kadet\/a15577a9e159816aaa3be6790cc59bd6.jpg","\/kadet\/ff6173b1460097290a00acdc1d5ed299.jpg","\/kadet\/f5df68f4f8732f31a370c0a05bfb9299.jpg","\/kadet\/121a32ec8940a5a72e0f071ad24810e9.jpg","\/kadet\/52f0e222e5d4a112bbf970ed2f7f437b.jpg","\/kadet\/2c297f32d37fbf8884eb82e4c6fd7dfd.jpg","\/kadet\/1495ca69251df1a5defe4e91e8c51c62.jpg","\/kadet\/52fc2d0365a8d2df33a7d7a53e857c37.jpg","\/kadet\/4dee2bf42f964cfc3900813deea56bdf.jpg","\/kadet\/950eb53d4f3f5bf1144b9d3562d1c623.jpg","\/kadet\/378df97a77e00c0f98ddb792f7a2d3e0.jpg","\/kadet\/8a2ca1292849342ef227eb98e92df52f.jpg","\/kadet\/6dacbdbe189ca5cbaab4f94457d24675.jpg","\/kadet\/3760ed90ca4adb99e67b325e7d2484c0.jpg","\/kadet\/43269e57a945be410837eea5026d8e57.jpg","\/kadet\/6cd51e33ad868140a7b23419ab91d1f5.jpg","\/kadet\/59086270d8dc2b081207f2cd140052b0.jpg","\/kadet\/2f26fe64a9005814f5d5cd60547f4da9.jpg","\/kadet\/7a6d46b67056aa3e2771ac5b4f961a73.jpg","\/kadet\/a6a8f73557efe2c3936e2a448628f6d6.jpg","\/kadet\/6c2d21a4e6113ade5eed2384620016a2.jpg","\/kadet\/8bc2f4e16319089ebce239a882c12693.jpg","\/kadet\/99fd03bd84aaa9cd891e9f210e474bb6.jpg","\/kadet\/6d6a3d60a58c34273f3b82fbb7eff6ef.jpg","\/kadet\/944e603c10756225dec7b252244efe8c.jpg","\/kadet\/9b83067b4e8f71ef24bccc57380a90ba.jpg","\/kadet\/10e05866162e7ac81bcd41bdfa84348a.jpg","\/kadet\/5dae19b208fb362096966be960094c20.jpg","\/kadet\/9cbfe998e671c0aabac1c78179aecf43.jpg","\/kadet\/c7405c3b35bad7d9450782ce0b54119e.jpg","\/kadet\/be230050a1fef4533df4e6bc833bbaa6.jpg","\/kadet\/fea174171bb9230e76dee3b01b4b2563.jpg","\/kadet\/5711637782b035d604f96cb6c16e8526.jpg","\/kadet\/8aade13622592124c0915342cc953620.jpg","\/kadet\/c8a5f3cf3a9ea8a93b88671018e755f7.jpg","\/kadet\/fdab63fefe4a65fd312c8b2f017ef70f.jpg","\/kadet\/9e5fd21c16d8609b87157f41378b365a.jpg","\/kadet\/63eeed21f353fdd535625e8d1f3ea8a6.jpg","\/kadet\/509d31c9bdef529581cef42cf6e67aff.jpg","\/kadet\/c8789051ed7b6da8cc62c8a812bd665e.jpg","\/kadet\/09cefcba4e8f36ff15ad67c385e67aad.jpg","\/kadet\/97f2b78f883aaa2431f06f87bc1c8e2b.jpg","\/kadet\/7380e8c407cf298d24d23fd9d9e40b48.jpg","\/kadet\/ef58103f4e5657c528f8537ec1a5d391.jpg","\/kadet\/63b686f3879fd1172b09119d3684350e.jpg","\/kadet\/ffc619b8e9134e34fb7430de0425e6d4.jpg","\/kadet\/f120f42d121cfbbcea24315716ed0e86.jpg","\/kadet\/7cf19830decb3d91f4d951fa5c85b6c3.jpg","\/kadet\/df36fbcc093617e8afa698ea4e753f01.jpg","\/kadet\/858c1f66958e1dba4eef80ca5aadb48a.jpg","\/kadet\/255d643955617b9dd95f4814890b8512.jpg","\/kadet\/d2a2438f56350bf9415f29a747ea6183.jpg","\/kadet\/6d47a916d940b53a0dfe74ce6a151c0c.jpg","\/kadet\/afde6e2e6c94f7b2b1a01d829781829b.jpg","\/kadet\/0a2caca23ca261f047d6882c62e8f15f.jpg","\/kadet\/e5b6330fe69080c81aa0c366f59aa979.jpg","\/kadet\/928edf73eeceb06c68698344b1d51a96.jpg","\/kadet\/8dcfb378e20aa3cbac79bcd30541ba85.jpg","\/kadet\/d82b3793fd4fbc43543ca501d4e026f7.jpg","\/kadet\/b3834ebc35450ee6b01611c9bfb37b72.jpg","\/kadet\/a27d31f21c97c4e09238294f7e5d8b0d.jpg","\/kadet\/e22254be84e681cd6d5cf09908d37a87.jpg","\/kadet\/a17db1338d73549c54208be772cb37da.jpg","\/kadet\/bf3f00bdc655a2df8c6cf67223640ddd.jpg","\/kadet\/14303f635ec0b84104569f48776c516a.jpg","\/kadet\/9073fdf7e6182447cfc5e15468f57f71.jpg"]',
                'parent_id' => NULL,
                'created_at' => '2020-11-03 00:00:00'
            ],
            [
                'page_type' => '8',
                'title' => 'Южный военный округ',
                'text' => '.',
                'image' => '/kadet/b1/0001.jpg',
                'gallery' => '["\/kadet\/4d858cb48bc152151a4a0a37451c4911.jpg","\/kadet\/4d858cb48bc152151a4a0a37451c4911.jpg"]',
                'parent_id' => NULL,
                'created_at' => '2020-11-03 00:00:00'
            ],
            [
                'page_type' => '8',
                'title' => 'Фотоальбом 2019',
                'text' => '.',
                'image' => '/kadet/b2/0001.jpg',
                'gallery' => '["\/kadet\/b280a2df7fd094ac3dec87667a829046.jpg","\/kadet\/b280a2df7fd094ac3dec87667a829046.jpg"]',
                'parent_id' => NULL,
                'created_at' => '2020-11-03 00:00:00'
            ],
            [
                'page_type' => '8',
                'title' => 'Южный военный округ',
                'text' => '.',
                'image' => '/kadet/b1/0001.jpg',
                'gallery' => '["\/kadet\/4d858cb48bc152151a4a0a37451c4911.jpg","\/kadet\/4d858cb48bc152151a4a0a37451c4911.jpg"]',
                'parent_id' => NULL,
                'created_at' => '2020-11-03 00:00:00'
            ],
            ]);
    }
}
