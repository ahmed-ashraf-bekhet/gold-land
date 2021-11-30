<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karat;
use App\Http\Requests\KaratRequest;


class KaratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karats = Karat::get();

        return view('admin.karat.index', ['karats'=>$karats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karats = json_decode(file_get_contents('http://sabayiks.net/kw/public/api/feed'), true);
        // dd($karats);
        return view('admin.karat.create',compact('karats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KaratRequest $request)
    {
        $karat = Karat::create($request->only([
            'key',
            'title_en',
            'title_ar',
        ]));

        return redirect()->back()->with(['success'=>__('Created Successfully')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karat = Karat::find($id);

        if (!$karat)
            return entityNotFound();

        return new KaratResource($karat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karat = Karat::find($id);

        if (!$karat)
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);

        return view('admin.karat.edit', ['karat'=>$karat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KaratRequest $request, $id)
    {
        $karat = Karat::find($id);

        if (!$karat)
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);

        $karat->update($request->only([
            'key',
            'title_en',
            'title_ar',
        ]));

        return redirect()->back()->with(['success' => __('Updated Successfully') ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karat = Karat::find($id);

        if (!$karat)
            return redirect()->back()->withErrors([ __('Entity Not Found') ]);
        // Session::flash('message', "Special message goes here");

        $karat->delete();

        return redirect()->back()->with(['success' => __('Deleted Successfully') ]);
    }


    public function karats_list()
    {
        $data = json_decode(file_get_contents('https://sabayik.net/kw/public/api/feed'), true);
        $additions =
        $general = [
                'name_ar' => 'عام',
                'name_en' => 'general',
                'types'   => [
                        [
                            'name_ar' => 'الجرام عيار ٢٤',
                            'name_en' => 'Gram 24 Karat',
                            'price'   => $data['gold24']
                        ],
                        [
                            'name_ar' => 'الجرام عيار ٢٢',
                            'name_en' => 'Gram 22 Karat',
                            'price'   => $data['gold22']
                        ],
                        [
                            'name_ar' => 'الجرام عيار ٢١',
                            'name_en' => 'Gram 21 Karat',
                            'price'   => $data['gold21']
                        ],
                        [
                            'name_ar' => 'الجرام عيار ١٨',
                            'name_en' => 'Gram 18 Karat',
                            'price'   => $data['gold18']
                        ],
                    ]
            ];
        $swiss_gold_bar = [
                'name_ar' => 'سبائك سويسرية',
                'name_en' => 'Swiss Gold Bars',
                'types'   => [
                    [
                        'name_ar' => '١٠٠ جرام',
                        'name_en' => '100 gram',
                        'price'   => $data['su100']
                    ],
                    [
                        'name_ar' => '٥٠ جرام',
                        'name_en' => '50 gram',
                        'price'   => $data['su50']
                    ],
                    [
                        'name_ar' => 'اونصة',
                        'name_en' => 'OZ',
                        'price'   => $data['su31']
                    ],
                    [
                        'name_ar' => '٢٠ جرام',
                        'name_en' => '20 gram',
                        'price'   => $data['su20']
                    ],
                    [
                        'name_ar' => '١٠ جرام',
                        'name_en' => '10 gram',
                        'price'   => $data['su10']
                    ],
                    [
                        'name_ar' => '٥ جرام',
                        'name_en' => '5 gram',
                        'price'   => $data['su5']
                    ],
                    [
                        'name_ar' => '٢,٥ جرام',
                        'name_en' => '2.5 gram',
                        'price'   => $data['su2']
                    ],
                    [
                        'name_ar' => '١ جرام',
                        'name_en' => '1 gram',
                        'price'   => $data['su1']
                    ]
                    ]
            ];
        $emirates_gold_bar = [
                'name_ar' => 'سبائك اماراتية',
                'name_en' => 'Emirates Gold Bars',
                'types'   => [
                        [
                            'name_ar' => '١٠٠ جرام',
                            'name_en' => '100 gram',
                            'price'   => $data['em100']
                        ],
                        [
                            'name_ar' => '٥٠ جرام',
                            'name_en' => '50 gram',
                            'price'   => $data['em50']
                        ],
                        [
                            'name_ar' => 'اونصة',
                            'name_en' => 'OZ',
                            'price'   => $data['em31']
                        ],
                        [
                            'name_ar' => '٢٠ جرام',
                            'name_en' => '20 gram',
                            'price'   => $data['em20']
                        ],
                        [
                            'name_ar' => '١٠ جرام',
                            'name_en' => '10 gram',
                            'price'   => $data['em10']
                        ],
                        [
                            'name_ar' => '٥ جرام',
                            'name_en' => '5 gram',
                            'price'   => $data['em5']
                        ],
                        [
                            'name_ar' => '٢,٥ جرام',
                            'name_en' => '2.5 gram',
                            'price'   => $data['em2']
                        ],
                        [
                            'name_ar' => '١ جرام',
                            'name_en' => '1 gram',
                            'price'   => $data['em1']
                        ]
                    ]
                ];
        $bars = [
                'name_ar' => 'سبائك خام',
                'name_en' => 'Bars',
                'types'   => [
                        [
                            'name_ar' => 'كيلو',
                            'name_en' => 'kilo',
                            'price'   => $data['goldPurKg']
                        ],
                        [
                            'name_ar' => 'نصف كيلو',
                            'name_en' => 'Half a kilo',
                            'price'   => $data['goldPurHa']
                        ],
                        [
                            'name_ar' => 'ربع كيلو',
                            'name_en' => 'a quarter of a kilo',
                            'price'   => $data['goldPurQa']
                        ],
                        [
                            'name_ar' => '١٠ تولا',
                            'name_en' => '10 tola',
                            'price'   => $data['goldPurTa']
                        ]
                    ]
            ];
        $silver = [
                'name_ar' => 'فضة',
                'name_en' => 'Silver',
                'types'   => [
                        [
                            'name_ar' => '١ كيلو',
                            'name_en' => '1 kilo',
                            'price'   => $data['silverKg']
                        ],
                        [
                            'name_ar' => 'مخمس',
                            'name_en' => 'Mokhames',
                            'price'   => $data['silver5']
                        ],
                        [
                            'name_ar' => 'ليرا',
                            'name_en' => 'lira',
                            'price'   => $data['silverL']
                        ]
                    ]
            ];
        $pound_coin = [
                'name_ar' => 'جنيهات انجليزية',
                'name_en' => 'Pound coin',
                'types'   => [
                        [
                            'name_ar' => 'جنيه ٨ جرام',
                            'name_en' => 'Pound 8 gram',
                            'price'   => $data['pound']
                        ],
                        [
                            'name_ar' => 'نصف جنيه ٤ جرام',
                            'name_en' => 'Half a pound 4 gram',
                            'price'   => $data['poundHa']
                        ]
                    ]
            ];
        $lira = [
                'name_ar' => 'ليرا',
                'name_en' => 'Lira',
                'types'   => [
                        [
                            'name_ar' => 'ليرا',
                            'name_en' => 'lira',
                            'price'   => $data['lira']
                        ],
                        [
                            'name_ar' => 'نصف ليرا',
                            'name_en' => 'Half a lira',
                            'price'   => $data['liraHa']
                        ],
                        [
                            'name_ar' => 'ربع ليرا',
                            'name_en' => 'a quarter of a lira',
                            'price'   => $data['liraQa']
                        ],
                        [
                            'name_ar' => 'مخمس',
                            'name_en' => 'mokhames',
                            'price'   => $data['liraKh']
                        ],
                        [
                            'name_ar' => 'نصف مخمس',
                            'name_en' => 'Half a mokhames',
                            'price'   => $data['liraKhHa']
                        ],
                    ]
            ];
        $karats = [$general,$bars,$silver,$lira,$pound_coin,$swiss_gold_bar,$emirates_gold_bar];
        return view('karats_prices', ['karats'=>$karats]);
    }

}
