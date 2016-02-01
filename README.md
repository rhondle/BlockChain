# Simple BlockChain Example

A very simple BlockChain implementation intended to illustrate the concept.

Original code, August 2015
by Marty Anstey (https://marty.anstey.ca/)
latest code at https://github.com/rhondle/BlockChain

### File Formats
All values are stored as little-endian, and the hash used is SHA256.

##### ISAM Index
This file is simply a quick way to access any block in the chain. It's intended to be used to fetch the offset and length of any block without walking the entire chain, which is particularly useful when appending new blocks to the blockchain.

_Header_

type     | size | description
:---------|:---:|:-------------
uint32 | 4 | Record count

_Records_

type     | size | description
:---------|:---:|:-------------
uint32 | 4 | Offset
uint32 | 4 | Length


##### BlockChain
The blockchain is simply a concatenated collection of blocks. The hash from the previous block is stored in the current block, forming a cryptographically verifiable chain and hardening the preceding blocks against tampering.

type     | size | description
:---------|:---:|:-------------
uint32 | 4 | Magic
uint8 | 1 | Block format
uint32 | 4 | Timestamp
uint8[32] | 32 | Previous hash
uint32 | 4 | Data length
data | ? | Arbitrary data

Example tool output for the test blockchain:

```
$ dumpindex
0    OFS: 0        LEN: 195
1    OFS: 195      LEN: 332
2    OFS: 527      LEN: 97
3    OFS: 624      LEN: 451
4    OFS: 1075     LEN: 117


$ walkchain
height...... 1
magic....... d5e8a97f
version..... 1
timestamp... 1440021658 (22:00:58 08/19/2015)
prevhash.... 0000000000000000000000000000000000000000000000000000000000000000
blockhash... 87988ac16e72dd2b6878c83e03ef99264d7f6e6955df83ac955ac7e7e6f1185e
datalen..... 150
data........ Aug 19, 2015 Bitcoin Price Falls 14% Following Bitfinex 'Flash Crash'
(http://www.coindesk.com/bitcoin-price-falls-14-following-bitfinex-flash-crash/)

height...... 2
magic....... d5e8a97f
version..... 1
timestamp... 1440021687 (22:01:27 08/19/2015)
prevhash.... 87988ac16e72dd2b6878c83e03ef99264d7f6e6955df83ac955ac7e7e6f1185e
blockhash... 5314b241d82e60d35786ee3a876c883cf6c623ec8f81c443d306ed2cbc808d80
datalen..... 287
data........ He had come a long way to this blue lawn and his dream must have seemed so close that he could
hardly fail to grasp it. He did not know that it was already behind him, somewhere back in that vast
obscurity beyond the city, where the dark fields of the republic rolled on under the night.

height...... 3
magic....... d5e8a97f
version..... 1
timestamp... 1440024279 (22:44:39 08/19/2015)
prevhash.... 5314b241d82e60d35786ee3a876c883cf6c623ec8f81c443d306ed2cbc808d80
blockhash... 25eb4659f629659f3074d3f485b736307f24968490eef359cfe2d364d9ab7048
datalen..... 52
data........ How a Bitcoin Transaction Works (www.bit.ly/1HWNbc4)

height...... 4
magic....... d5e8a97f
version..... 1
timestamp... 1440024364 (22:46:04 08/19/2015)
prevhash.... 25eb4659f629659f3074d3f485b736307f24968490eef359cfe2d364d9ab7048
blockhash... ae0bfb7a9ee6ddfc8a8443320e59b22421971391504a70399eb0a1ff8fe9a60f
datalen..... 406
data........ https://en.bitcoin.it/wiki/Genesis_block A genesis block is the first block of a block chain. Modern
versions of Bitcoin assign it block number 0, though older versions gave it number 1. The genesis
block is almost always hardcoded into the software. It is a special case in that it does not
reference a previous block, and for Bitcoin and almost all of its derivatives, it produces an
unspendable subsidy.

height...... 5
magic....... d5e8a97f
version..... 1
timestamp... 1440024695 (22:51:35 08/19/2015)
prevhash.... ae0bfb7a9ee6ddfc8a8443320e59b22421971391504a70399eb0a1ff8fe9a60f
blockhash... 25940c512f3795f460dedd9e359e6c2cd7ac3f8269531d4aa1a7be2fd74fad69
datalen..... 72
data........ RVhBTVBMRTogQUxJQ0UgU0VORFMgQk9CICQyLjk1IFVTRCBBVCAyMjo0OSAxOS84LzIwMTU=
```
https://pastebin.com/raw.php?i=Dpwg7xvy
