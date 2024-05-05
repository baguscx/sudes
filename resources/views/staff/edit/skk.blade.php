<x-app-layout>
    <div class="pd-20 card-box mb-30">
    <form method="POST" action="{{ route('warga.surat.store') }}" enctype="multipart/form-data">
        @csrf
        <x-text-input value="skk" name="jenis_surat" type="text" hidden/>
        <div class="clearfix">
            <h4 class="text-blue h4">Surat Keterangan Tidak Mampu</h4>
            {{-- <p class="mb-30">jQuery Step wizard</p> --}}
        </div>
        <div class="wizard-content">

                <h6>Data orang meninggal :</h6>
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Nama : </x-input-label>
                                <x-text-input value="{{ old('nama', $detailSurat->nama) }}" name="nama" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Bin/Binti : </x-input-label>
                                <x-text-input value="{{ old('bin', $detailSurat->bin) }}" name="bin" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('bin')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>NIK : </x-input-label>
                                <x-text-input value="{{ old('nik', $detailSurat->nik) }}" name="nik" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin :</label>
                                <select name="gender" class="form-control">
                                    <option>Pilih Jenis Kelamin</option>
                                    <option {{ $detailSurat->gender == 'laki-laki' ? 'selected' : '' }} value="laki-laki">Laki - laki</option>
                                    <option {{ $detailSurat->gender == 'perempuan' ? 'selected' : '' }} value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Tempat Lahir : </x-input-label>
                                <x-text-input value="{{ old('tempat_lahir', $detailSurat->tempat_lahir) }}" name="tempat_lahir" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Tanggal Lahir : </x-input-label>
                                <x-text-input value="{{ old('tanggal_lahir', $detailSurat->tanggal_lahir) }}" name="tanggal_lahir" type="date" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('tanggal_lahir')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Warganegara : </x-input-label>
                                <x-text-input value="{{ old('warganegara', $detailSurat->warganegara) }}" name="warganegara" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('warganegara')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Agama : </x-input-label>
                                <x-text-input value="{{ old('agama', $detailSurat->agama) }}" name="agama" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('agama')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status Pernikahan :</label>
                                <select name="status_pernikahan" class="form-control">
                                    <option>Pilih Status Pernikahan</option>
                                    <option {{ $detailSurat->status_pernikahan == 'Belum Menikah' ? 'selected' : '' }} value="Belum Menikah">Belum Menikah</option>
                                    <option {{ $detailSurat->status_pernikahan == 'Menikah' ? 'selected' : '' }} value="Menikah">Menikah</option>
                                    <option {{ $detailSurat->status_pernikahan == 'Pernah Menikah' ? 'selected' : '' }} value="Pernah Menikah">Pernah Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Pekerjaan : </x-input-label>
                                <x-text-input value="{{ old('pekerjaan', $detailSurat->pekerjaan) }}" name="pekerjaan" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat :</label>
                                <textarea name="alamat" class="form-control">{{$detailSurat->alamat}}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                            </div>
                        </div>
                    </div>
                </section>

                <h6>Telah meninggal pada :</h6>
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Tanggal Meninggal : </x-input-label>
                                <x-text-input value="{{ old('tanggal_meninggal', $detailSurat->tanggal_meninggal) }}" name="tanggal_meninggal" type="date" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('tanggal_meninggal')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Jam : </x-input-label>
                                <x-text-input value="{{ old('jam_meninggal'), $detailSurat->jam_meninggal }}" name="jam_meninggal" type="time" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('jam_meninggal')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Tempat Meninggal : </x-input-label>
                                <x-text-input value="{{ old('tempat_meninggal', $detailSurat->tempat_meninggal) }}" name="tempat_meninggal" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('tempat_meninggal')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Sebab Meninggal : </x-input-label>
                                <x-text-input value="{{ old('sebab_meninggal', $detailSurat->sebab_meninggal) }}" name="sebab_meninggal" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('sebab_meninggal')" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Berkas Persyaratan (.zip / .rar) : </x-input-label>
                                <x-text-input value="{{ old('berkas') }}" name="berkas" type="file" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('berkas')" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <x-button.primary-button>Submit</x-button.primary-button>
                        </div>
                    </div>
                </section>
        </div>
    </form>
</div>

</x-app-layout>
