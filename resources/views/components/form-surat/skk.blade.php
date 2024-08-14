<div {{$attributes}} style="display: none;" class="pd-20 card-box mb-30">
    <form method="POST" action="{{ route('warga.surat.store') }}" enctype="multipart/form-data">
        @csrf
        <x-text-input value="skk" name="jenis_surat" type="text" hidden/>

        <div class="clearfix">
            <h4 class="text-blue h4">Surat Keterangan Kematian</h4>
        </div>

        <div class="wizard-content">
                <h6>Data orang meninggal :</h6>
                <section>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Nama : </x-input-label>
                                <x-text-input value="{{ old('nama') }}" name="nama" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Bin/Binti : </x-input-label>
                                <x-text-input value="{{ old('bin') }}" name="bin" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('bin')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>NIK : </x-input-label>
                                <x-text-input value="{{ old('nik') }}" name="nik" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin :</label>
                                <select name="gender" class="form-control">
                                    <option>Pilih Jenis Kelamin</option>
                                    <option value="Laki - Laki">Laki - laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Tempat Lahir : </x-input-label>
                                <x-text-input value="{{ old('tempat_lahir') }}" name="tempat_lahir" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Tanggal Lahir : </x-input-label>
                                <x-text-input value="{{ old('tanggal_lahir') }}" name="tanggal_lahir" type="date" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('tanggal_lahir')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Kewarganegaraan : </x-input-label>
                                <x-text-input value="{{ old('kewarganegaraan') }}" name="kewarganegaraan" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('kewarganegaraan')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Agama : </x-input-label>
                                <select name="agama" class="form-control">
                                    <option>Pilih Jenis Kelamin</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('agama')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status Pernikahan :</label>
                                <select name="status_pernikahan" class="form-control">
                                    <option>Pilih Status Pernikahan</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Pernah Menikah">Pernah Menikah</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Pekerjaan : </x-input-label>
                                <x-text-input value="{{ old('pekerjaan') }}" name="pekerjaan" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Dusun</label>
                                <select name="dusun" class="form-control">
                                    <option>Pilih Dusun</option>
                                    <option value="Gersikan">Gersikan</option>
                                    <option value="Ngayunan Barat">Ngayunan Barat</option>
                                    <option value="Ngayunan Timur">Ngayunan Timur</option>
                                    <option value="Kedungringin Utara">Kedungringin Utara</option>
                                    <option value="Kedungringin Tengah">Kedungringin Tengah</option>
                                    <option value="Kedungringin Selatan">Kedungringin Selatan</option>
                                    <option value="Guyangan">Guyangan</option>
                                    <option value="Bahrowo">Bahrowo</option>
                                    <option value="Balungrejo">Balungrejo</option>
                                    <option value="Ngampel">Ngampel</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <label>RT</label>
                                <select name="rt" class="form-control">
                                    <option>RT</option>
                                    @for ($i = 1; $i <= 23; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <label>RW</label>
                                <select name="rw" class="form-control">
                                    <option>RW</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Berkas Persyaratan (.zip / .rar) : [[ <a href="#">Lihat Syarat</a> ]]</x-input-label>
                                <x-text-input value="{{ old('berkas') }}" name="berkas" type="file" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('berkas')" />
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
                                <x-text-input value="{{ old('tanggal_meninggal') }}" name="tanggal_meninggal" type="date" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('tanggal_meninggal')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Jam : </x-input-label>
                                <x-text-input value="{{ old('jam_meninggal') }}" name="jam_meninggal" type="time" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('jam_meninggal')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Tempat Meninggal : </x-input-label>
                                <x-text-input value="{{ old('tempat_meninggal') }}" name="tempat_meninggal" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('tempat_meninggal')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Sebab Meninggal : </x-input-label>
                                <x-text-input value="{{ old('sebab_meninggal') }}" name="sebab_meninggal" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('sebab_meninggal')" />
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
