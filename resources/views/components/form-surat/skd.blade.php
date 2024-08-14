<div {{ $attributes }} style="display: none;" class="pd-20 card-box mb-30">
    <form method="POST" action="{{ route('warga.surat.store') }}" enctype="multipart/form-data">
    @csrf
        <x-text-input value="skd" name="jenis_surat" type="text" hidden/>

        <div class="clearfix">
            <h4 class="text-blue h4">Surat Keterangan Domisili</h4>
        </div>
        <div class="wizard-content">
                <section>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Nama : </x-input-label>
                                <x-text-input value="{{ old('name', Auth::user()->name ?? '') }}" name="nama" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>NIK : </x-input-label>
                                <x-text-input value="{{ old('nik', Auth::user()->detail_users->nik ?? '') }}" name="nik" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin :</label>
                                <select name="gender" class="form-control" >
                                    <option>Pilih Jenis Kelamin</option>
                                    <option {{Auth::user()->detail_users->gender == 'laki-laki' ? 'selected' : ''}} value="Laki - Laki">Laki - laki</option>
                                    <option {{Auth::user()->detail_users->gender == 'perempuan' ? 'selected' : ''}} value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Tempat Lahir : </x-input-label>
                                <x-text-input value="{{ old('tempat_lahir', Auth::user()->detail_users->born_place) }}" name="tempat_lahir" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('tempat_lahir')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Tanggal Lahir : </x-input-label>
                                <x-text-input value="{{ old('tanggal_lahir', Auth::user()->detail_users->born_date) }}" name="tanggal_lahir" type="date" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('tanggal_lahir')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Agama : </x-input-label>
                                <select name="agama" class="form-control" >
                                    <option>Pilih Agama</option>
                                    <option {{Auth::user()->detail_users->religion == 'islam' ? 'selected' : ''}} value="Islam">Islam</option>
                                    <option {{Auth::user()->detail_users->religion == 'kristen' ? 'selected' : ''}} value="Kristen">Kristen</option>
                                    <option {{Auth::user()->detail_users->religion == 'hindu' ? 'selected' : ''}} value="Hindu">Hindu</option>
                                    <option {{Auth::user()->detail_users->religion == 'budha' ? 'selected' : ''}} value="Budha">Budha</option>
                                    <option {{Auth::user()->detail_users->religion == 'konghucu' ? 'selected' : ''}} value="Konghucu">Konghucu</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('agama')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Kewarganegaraan : </x-input-label>
                                <x-text-input value="{{ old('kewarganegaraan', Auth::user()->detail_users->kewarganegaraan) }}" name="kewarganegaraan" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('kewarganegaraan')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Pekerjaan : </x-input-label>
                                <x-text-input value="{{ old('pekerjaan', Auth::user()->detail_users->pekerjaan) }}" name="pekerjaan" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('pekerjaan')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status Pernikahan :</label>
                                <select name="status_pernikahan" class="form-control" >
                                    <option>Pilih Status Pernikahan</option>
                                    <option {{Auth::user()->detail_users->status_perkawinan == 'belum' ? 'selected' : ''}} value="Belum Menikah">Belum Menikah</option>
                                    <option {{Auth::user()->detail_users->status_perkawinan == 'sudah' ? 'selected' : ''}} value="Menikah">Menikah</option>
                                    <option {{Auth::user()->detail_users->status_perkawinan == 'pernah' ? 'selected' : ''}} value="Pernah Menikah">Pernah Menikah</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Dusun</label>
                                <select name="dusun" class="form-control" >
                                    <option>Pilih Dusun</option>
                                    <option {{Auth::user()->detail_users->address == 'Gersikan' ? 'selected' : ''}} value="Gersikan">Gersikan</option>
                                    <option {{Auth::user()->detail_users->address == 'Ngayunan Barat' ? 'selected' : ''}} value="Ngayunan Barat">Ngayunan Barat</option>
                                    <option {{Auth::user()->detail_users->address == 'Ngayunan Timur' ? 'selected' : ''}} value="Ngayunan Timur">Ngayunan Timur</option>
                                    <option {{Auth::user()->detail_users->address == 'Kedungringin Utara' ? 'selected' : ''}} value="Kedungringin Utara">Kedungringin Utara</option>
                                    <option {{Auth::user()->detail_users->address == 'Kedungringin Tengah' ? 'selected' : ''}} value="Kedungringin Tengah">Kedungringin Tengah</option>
                                    <option {{Auth::user()->detail_users->address == 'Kedungringin Selatan' ? 'selected' : ''}} value="Kedungringin Selatan">Kedungringin Selatan</option>
                                    <option {{Auth::user()->detail_users->address == 'Guyangan' ? 'selected' : ''}} value="Guyangan">Guyangan</option>
                                    <option {{Auth::user()->detail_users->address == 'Bahrowo' ? 'selected' : ''}} value="Bahrowo">Bahrowo</option>
                                    <option {{Auth::user()->detail_users->address == 'Balungrejo' ? 'selected' : ''}} value="Balungrejo">Balungrejo</option>
                                    <option {{Auth::user()->detail_users->address == 'Ngampel' ? 'selected' : ''}} value="Ngampel">Ngampel</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <label>RT</label>
                                <select name="rt" class="form-control" >
                                    <option>RT</option>
                                    @for ($i = 1; $i <= 23; $i++)
                                        <option {{ Auth::user()->detail_users->rt == $i ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <label>RW</label>
                                <select name="rw" class="form-control" >
                                    <option>RW</option>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option {{ Auth::user()->detail_users->rw == $i ? 'selected' : '' }} value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <x-input-label>Keperluan : </x-input-label>
                                <x-text-input value="{{ old('tujuan') }}" name="tujuan" type="text" class="form-control" />
                                <x-input-error class="mt-2" :messages="$errors->get('tujuan')" />
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

                    <div class="row">
                        <div class="col-md-6">
                            <x-button.primary-button>Submit</x-button.primary-button>
                        </div>
                    </div>

                </section>

        </div>
    </form>
</div>
