// FlowPass
// 23.11.2022
//
// This file is part of FlowPass.
//
// FlowPass components is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with FlowPass.  If not, see <http://www.gnu.org/licenses/>.
//
// © 2021-2022 FlowPass

import QrScanner from 'qr-scanner.min.js'; // if using plain es6 import
// To enforce the use of the new api with detailed scan results, call the constructor with an options object, see below.
const qrScanner = new QrScanner(
    videoElem,
    result => console.log('decoded qr code:', result),
    { /* your options or returnDetailedScanResult: true if you're not specifying any other options */ },
);

// For backwards compatibility, omitting the options object will currently use the old api, returning scan results as
// simple strings. This old api will be removed in the next major release, by which point the options object is then
// also not required anymore to enable the new api.
const qrScanner = new QrScanner(
    videoElem,
    result => console.log('decoded qr code:', result),
    // No options provided. This will use the old api and is deprecated in the current version until next major version.
);
